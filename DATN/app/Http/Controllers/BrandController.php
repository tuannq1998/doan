<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all();
        $viewData = [
            'brands' => $brands
        ];
        return view('admin.brand.list', $viewData);
    }

    public function create(){
        return view('admin.brand.create');
    }
    public function store(Request $request){

        Brand::create([
            'name'            => $request->name,
            'description'     => $request->description,
            'status'          =>$request->status,
        ]);
        Session::put('message','Add successful brands');
        return redirect()->Route('brand.list');
    }
    public function edit($id){
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }
    public function update(Request $request, $id){
        $brand = Brand::findOrFail($id);
//        $brand->update([
//            'name' => $request->name,
//            'descripsion' => $request->descripsion,
//        ]);
        $brand->name     = $request->input('name');
        $brand->description     = $request->input('description');
        $brand->save();
        return redirect()->Route('brand.list')->with('success', 'Update brand successfully');
    }
    public function destroy($id)
    {
        Brand::findOrFail($id)->delete();

        return redirect()->Route('brand.list')->with('success', 'Delete brand successfully');
    }
    public function status($id)
    {
        $brand = Brand::find($id);
        $brand->status = ! $brand->status;
        $brand->save();
        return redirect()->back();
    }
}
