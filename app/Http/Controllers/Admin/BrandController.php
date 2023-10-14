<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\StoreRequest;
use App\Http\Requests\Admin\Brand\UpdateRequest;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:brand-list|brand-create|brand-edit|brand-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:brand-delete', ['only' => ['destroy']]);
        $this->middleware('permission:brand-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:brand-show', ['only' => ['show']]);
        
        $this->middleware('permission:brand-show', ['only' => ['show']]);
    }
    
    public function index()
    {
        $data['item'] = DB::table('brands')->get();
        return view('admin.brands.index', $data);
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');

        $logo = $request->logo;
        $image = time() . "-" . $logo->getClientOriginalName();
        $path = public_path() . "/upload";
        $logo->move($path, $image);
        $data['logo'] = $image;
        $data['created_at'] = now();
        DB::table('brands')->insert($data);
        return redirect()->route('admin.brands.index')->with('success', 'Tạo thành công');
    }

    public function show(string $id)
    {
        $data['item'] = DB::table('brands')
            ->where('id', $id)
            ->first();
        return view('admin.brands.show', $data);
    }

    public function edit(string $id)
    {
        $data['item'] = DB::table('brands')
            ->where('id', $id)
            ->first();
        return view('admin.brands.edit', $data);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $data = $request->except('_token');
       
        if (empty($data['logo'])) {
            $da['logo'] = DB::table('brands')->where('id', $id)->first();
            $data['logo'] = $da['logo']->logo;
        } else {
            $logo = $request->logo;
            $image = time() . "-" . $logo->getClientOriginalName();
            $path = public_path() . "/upload";
            $logo->move($path, $image);
            $data['logo'] = $image;
        }

        
        $data['updated_at'] = now();
        DB::table('brands')->where('id', $id)->update($data);
        return redirect()->route('admin.brands.index')->with('success', 'Chỉnh sửa thành công');
    }

    public function destroy(string $id)
    {
        DB::table('brands')->where('id', $id)->delete();
        return redirect()->route('admin.brands.index')->with('success', 'Xóa thành công');
    }
}
