<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:childcategory-list|childcategory-create|childcategory-edit|childcategory-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:childcategory-delete', ['only' => ['destroy']]);
        $this->middleware('permission:childcategory-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:childcategory-show', ['only' => ['pdf']]);
        $this->middleware('permission:childcategory-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $data['item'] = DB::table('child_categories')
            ->join('sub_categories', 'child_categories.subcategory_id', '=', 'sub_categories.id')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->select('child_categories.*',  'sub_categories.*', 'categories.*')
            ->get();
        return view('admin.childcategories.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['item'] = DB::table('sub_categories')->get();
        return view('admin.childcategories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();
        DB::table('child_categories')->insert($data);
        return redirect()->route('admin.childcategories.index')->with('success', 'Tạo thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['item'] = DB::table('child_categories')
            ->where('id', $id)
            ->first();
            return view('admin.childcategories.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['item_cat'] = DB::table('sub_categories')->get();

        $data['item'] = DB::table('child_categories')
            ->where('id', $id)
            ->first();

        return view('admin.childcategories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();
        DB::table('child_categories')->where('id', $id)->update($data);
        return redirect()->route('admin.childcategories.index')->with('success', 'Edit thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Nếu không có lịch đặt liên quan, tiến hành xóa dịch vụ
        DB::table('child_categories')->where('id', $id)->delete();
        return redirect()->route('admin.childcategories.index')->with('success', 'Xóa thành công');
    }
}
