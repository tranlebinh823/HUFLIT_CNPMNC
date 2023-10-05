<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $products = DB::table('products')
            ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->select('products.*', 'sub_categories.subcategory_name', 'categories.category_name')
            ->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        // Lấy danh sách các danh mục con và chuyển nó đến view
        $categories = DB::table('categories')->get();
        $subCategories = DB::table('sub_categories')->get();
        return view('admin.products.create', compact('subCategories','categories'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');

        // Tạo slug từ tên sản phẩm
        $data['slug'] = Str::slug($data['product_name']);


        //upload
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $image = time() . "-" . $file->getClientOriginalName();
            $path = public_path() . "/upload";
            $file->move($path, $image);
            $data['images'] = $image;
        }

        // multi upload
        $images = [];
        if ($request->hasFile('images_gallery')) {
            foreach ($request->file('images_gallery') as $image) {
                $fileName = $image->getClientOriginalName();
                $image->move(public_path('assets'), $fileName);
                $images[] = $fileName;
            }
        }
        $data['images_gallery'] = json_encode($images);
        $data['created_at'] = now();

        // Lưu sản phẩm vào cơ sở dữ liệu
        DB::table('products')->insert($data);

        return redirect()->route('admin.products.index')->with('success', 'Tạo sản phẩm thành công');
    }

    public function show($id)
    {
        $product = DB::table('products')
            ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->select('products.*', 'sub_categories.subcategory_name', 'categories.category_name')
            ->where('products.id', '=', $id)
            ->first();

        if (!$product) {
            return redirect()->route('admin.products.index')->with('error', 'Không tìm thấy sản phẩm');
        }

        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = DB::table('products')
            ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->select('products.*', 'sub_categories.subcategory_name', 'categories.category_name')
            ->where('products.id', '=', $id)
            ->first();

        $subCategories = DB::table('sub_categories')->get();
        $categories = DB::table('categories')->get();

        if (!$product) {
            return redirect()->route('admin.products.index')->with('error', 'Không tìm thấy sản phẩm');
        }

        return view('admin.products.edit', compact('product', 'subCategories','categories'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token', '_method');

        // Tạo slug từ tên sản phẩm
        $data['slug'] = Str::slug($data['product_name']);

        //upload
        if ($request->hasFile('images_gallery')) {
            $file = $request->file('images_gallery');
            $image = time() . "-" . $file->getClientOriginalName();
            $path = public_path() . "/upload";
            $file->move($path, $image);
            $data['images_gallery'] = $image;
        }

        // multi upload
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $fileName = $image->getClientOriginalName();
                $image->move(public_path('assets'), $fileName);
                $images[] = $fileName;
            }
        }
        $data['images'] = json_encode($images);

        // Cập nhật sản phẩm
        DB::table('products')->where('id', $id)->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    public function destroy($id)
    {
        $product = DB::table('products')->find($id);

        if (!$product) {
            return redirect()->route('admin.products.index')->with('error', 'Không tìm thấy sản phẩm');
        }

        DB::table('products')->where('id', $id)->delete();

        return redirect()->route('admin.products.index')->with('success', 'Xóa sản phẩm thành công');
    }
}
