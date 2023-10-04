<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function show($id)
    {
        $product = DB::table('products')
            ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->select('products.*', 'sub_categories.subcategory_name', 'categories.category_name')
            ->where('products.id', '=', $id)
            ->first();

        if (!$product) {
            return redirect()->route('all-category')->with('error', 'Không tìm thấy sản phẩm');
        }
        return view('client.pages.products.product-detail', compact('product'));

    }
    public function index()
    {
        $products = DB::table('products')
            ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->select('products.*', 'sub_categories.subcategory_name', 'categories.category_name')
            ->paginate(10);

        return view('client.pages.products.product-list', compact('products'));
    }
}
