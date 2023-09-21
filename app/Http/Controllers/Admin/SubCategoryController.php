<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['item'] = DB::table('sub_categories')
        ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
        ->select('sub_categories.id', 'sub_categories.subcategory_name', 'categories.category_name')
        ->get();
        return view('admin.subcategories.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['item'] = DB::table('categories')->get();
        return view('admin.subcategories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();
        DB::table('sub_categories')->insert($data);
        return redirect()->route('admin.subcategories.index')->with('success', 'Tạo thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['item'] = DB::table('sub_categories')
            ->where('id', $id)
            ->first();
            return view('admin.subcategories.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['item_cat'] = DB::table('categories')->get();

        $data['item'] = DB::table('sub_categories')
            ->where('id', $id)
            ->first();

        return view('admin.subcategories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();
        DB::table('sub_categories')->where('id', $id)->update($data);
        return redirect()->route('admin.subcategories.index')->with('success', 'Edit thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Nếu không có lịch đặt liên quan, tiến hành xóa dịch vụ
        DB::table('sub_categories')->where('id', $id)->delete();
        return redirect()->route('admin.subcategories.index')->with('success', 'Xóa thành công');
    }
}
