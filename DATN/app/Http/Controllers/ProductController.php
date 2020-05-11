<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $viewData = [
            'products' => $products
        ];
        return view('admin.product.list', $viewData);
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $viewData = [
            'categories' => $categories,
            'brands' => $brands
        ];
        return view('admin.product.create', $viewData);
    }

    public function store(Request $request)
    {
        $file['name'] = "";
        if ($request->hasFile('image')) {
            $file = upload_image('image');
        }
        Product::create([
            'name' => $request->name,
            'title' => $request->title,
            'price' => $request->price,
            'image' => $file['name'],
            'content' => $request->content,
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        Session::put('message', 'Add successful products');
        return redirect()->Route('product.list');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
//        $product->update([
//            'name' => $request->name,
//            'descripsion' => $request->descripsion,
//        ]);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->save();
        return redirect()->Route('product.list')->with('success', 'Update product successfully');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->Route('product.list')->with('success', 'Delete product successfully');
    }

    public function status($id)
    {
        $product = Product::find($id);
        $product->status = !$product->status;
        $product->save();
        return redirect()->back();
    }
}
