<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Vendor\StoreRequest;
use App\Http\Requests\Admin\Vendor\UpdateRequest;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:vendor-list|vendor-create|vendor-edit|vendor-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:vendor-delete', ['only' => ['destroy']]);
        $this->middleware('permission:vendor-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:vendor-show', ['only' => ['show']]);
    }

    public function index()
    {
        $data['item'] = DB::table('vendors')->get();
        return view('admin.vendors.index', $data);
    }

    public function create()
    {
        return view('admin.vendors.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');

       
        $data['created_at'] = now();
        DB::table('vendors')->insert($data);
        return redirect()->route('admin.vendors.index')->with('success', 'Tạo thành công');
    }

    public function show(string $id)
    {
        $data['item'] = DB::table('vendors')
            ->where('id', $id)
            ->first();
        return view('admin.vendors.show', $data);
    }

    public function edit(string $id)
    {
        $data['item'] = DB::table('vendors')
            ->where('id', $id)
            ->first();
        return view('admin.vendors.edit', $data);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $data = $request->except('_token');
       
       
        
        $data['updated_at'] = now();
        DB::table('vendors')->where('id', $id)->update($data);
        return redirect()->route('admin.vendors.index')->with('success', 'Chỉnh sửa thành công');
    }

    public function destroy(string $id)
    {
        DB::table('vendors')->where('id', $id)->delete();
        return redirect()->route('admin.vendors.index')->with('success', 'Xóa thành công');
    }
}
