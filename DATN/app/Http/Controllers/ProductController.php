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
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::orderby('id', 'desc')->get();
        $viewData = [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands
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
            'slug' => str_slug($request->name),
            'title' => $request->title,
            'price' => $request->price,
            'image' => $file['name'],
            'contents' => $request->content,
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
        $categories = Category::all();
        $brands = Brand::all();
        $viewData = [
            'categories' => $categories,
            'brands' => $brands,
            'product' => $product
        ];
        return view('admin.product.edit', $viewData);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $file['name'] = "";
        if ($request->hasFile('image')) {
            $file = upload_image('image');
        }
        $product->update([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'title' => $request->title,
            'price' => $request->price,
            'image' => $file['name'],
            'contents' => $request->contents,
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        Session::put('message', 'Update successful products');
        return redirect()->Route('product.list');
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
