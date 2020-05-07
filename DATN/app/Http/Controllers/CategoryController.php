<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        $viewData = [
            'categories' => $categories
        ];
        return view('admin.category.list', $viewData);
    }

    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){

        Category::create([
            'name'            => $request->name,
            'descripsion'     => $request->descripsion,
            'status'          =>$request->status,
        ]);
        Session::put('message','Add successful product categories');
        return redirect()->Route('category.product.list');
    }
    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id){
        $category = Category::findOrFail($id);
//        $category->update([
//            'name' => $request->name,
//            'descripsion' => $request->descripsion,
//        ]);
        $category->name     = $request->input('name');
        $category->descripsion     = $request->input('descripsion');
        $category->save();
        return redirect()->Route('category.product.list')->with('success', 'Update category product successfully');
    }
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->Route('category.product.list')->with('success', 'Delete teacher successfully');
    }
    public function status($id)
    {
        $category = Category::find($id);
        $category->status = ! $category->status;
        $category->save();
        return redirect()->back();
    }
}
