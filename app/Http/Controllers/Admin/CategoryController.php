<?php

namespace App\Http\Controllers\Admin;

use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
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


    public function index(){
        $data['item'] = DB::table('categories')->get();
        return view('admin.categories.index',$data);
    }

    public function create()
    {
        $data['item'] = DB::table('categories')->get();
        return view('admin.categories.create', $data);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();
        DB::table('categories')->insert($data);
        return redirect()->route('admin.categories.index')->with('success', 'Tạo thành công');
    }

    public function show(Category $category): View
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category): View
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully');
    }

    // Phương thức để tạo bảng categories nếu chưa tồn tại
    public function createCategoryTable(): RedirectResponse
    {
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('category_name');
                $table->timestamps();
            });
            return redirect()->back()->with('success', 'Categories table created successfully.');
        } else {
            return redirect()->back()->with('warning', 'Categories table already exists.');
        }
    }
}
