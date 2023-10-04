<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AllCategoryController extends Controller
{
    public function index(){
        return view('client.pages.all-category');
    }
}
