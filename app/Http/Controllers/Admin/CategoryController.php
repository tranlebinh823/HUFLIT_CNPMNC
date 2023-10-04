<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-show', ['only' => ['show']]);
    }

    public function index()
    {
        $data['items'] = DB::table('categories')->get(); // Đổi 'item' thành 'items'
        return view('admin.categories.index', $data);
    }

    public function create()
    {
        return view('admin.categories.index');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['slug'] = Str::slug($data['category_name']);
        $data['created_at'] = now();

        DB::table('categories')->insert($data);

        return redirect()->route('admin.categories.index')->with('success', 'Tạo danh mục thành công');
    }

    public function show($id)
    {
        $item = DB::table('categories')->find($id);

        if (!$item) {
            return redirect()->route('admin.categories.index')->with('error', 'Không tìm thấy danh mục');
        }

        return view('admin.categories.show', compact('item'));
    }

    public function edit($id)
    {
        $item = DB::table('categories')->find($id);

        if (!$item) {
            return redirect()->route('admin.categories.index')->with('error', 'Không tìm thấy danh mục');
        }

        return view('admin.categories.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        $data['slug'] = Str::slug($data['category_name']);

        DB::table('categories')->where('id', $id)->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật danh mục thành công');
    }

    public function destroy($id)
    {
        $item = DB::table('categories')->find($id);

        if (!$item) {
            return redirect()->route('admin.categories.index')->with('error', 'Không tìm thấy danh mục');
        }

        DB::table('categories')->where('id', $id)->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Xóa danh mục thành công');
    }
}
