<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategory\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:subcategory-list|subcategory-create|subcategory-edit|subcategory-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:subcategory-delete', ['only' => ['destroy']]);
        $this->middleware('permission:subcategory-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:subcategory-show', ['only' => ['show']]);
    }

    public function index()
    {
        $data['items'] = DB::table('sub_categories')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->select('categories.*', 'sub_categories.*')
            ->get();
        $data['categories'] = DB::table('categories')->get();

        return view('admin.subcategories.index', $data);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['slug'] = Str::slug($data['subcategory_name']);
        $data['created_at'] = now();

        DB::table('sub_categories')->insert($data);

        return redirect()->route('admin.subcategories.index')->with('success', 'Tạo danh mục con thành công');
    }

    public function show($id)
    {
        $item = DB::table('sub_categories')
        ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
        ->select('categories.category_name as parent_category_name', 'sub_categories.*')
        ->where('sub_categories.id', '=', $id)
        ->first();


        if (!$item) {
            return redirect()->route('admin.subcategories.index')->with('error', 'Không tìm thấy danh mục con');
        }

        return view('admin.subcategories.show', compact('item'));
    }

    public function edit($id)
    {
        $item = DB::table('sub_categories')->find($id);

        if (!$item) {
            return redirect()->route('admin.subcategories.index')->with('error', 'Không tìm thấy danh mục con');
        }

        return view('admin.subcategories.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        $data['slug'] = Str::slug($data['subcategory_name']);

        DB::table('sub_categories')->where('id', $id)->update($data);

        return redirect()->route('admin.subcategories.index')->with('success', 'Cập nhật danh mục con thành công');
    }

    public function destroy($id)
    {
        $item = DB::table('subcategories')->find($id);

        if (!$item) {
            return redirect()->route('admin.subcategories.index')->with('error', 'Không tìm thấy danh mục con');
        }

        DB::table('sub_categories')->where('id', $id)->delete();

        return redirect()->route('admin.subcategories.index')->with('success', 'Xóa danh mục con thành công');
    }
}
