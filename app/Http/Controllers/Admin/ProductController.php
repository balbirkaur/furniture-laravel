<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductCategory::all();
        return view('admin.products.index')->with('products', $products);
    }
    public function create(Request $request)
    {
        return view('admin.products.create');
    }
    public function store(Request $request)
    {
        $category = new ProductCategory();
        $category->product_name = $request->input('product_name');
        $category->product_slug = Str::slug($request->input('product_name'), "-");
        $category->product_description = $request->input('product_description');
        $category->save();
        $request->session()->flash('statuscode', 'success');
        return redirect('/product-category')->with('status', 'Category data has been Added.');
    }
    public function edit($id)
    {
        $products = ProductCategory::findOrFail($id);
        return view('admin.products.edit')->with('products', $products);
    }
    public function update(Request $request, $id)
    {
        $products = ProductCategory::find($id);
        $products->product_name = $request->input('product_name');
        $products->product_slug = Str::slug($request->input('product_name'), '-');
        $products->product_description = $request->input('product_description');
        $products->update();
        $request->session()->flash('statuscode', 'info');
        return redirect('/product-category')->with('status', 'Category data has been Added.');
    }
    public function delete(Request $request, $id)
    {
        $products = ProductCategory::findOrFail($id);
        $products->delete();
        return response()->json(['status' => 'Category data has been Deleted.']);
    }
}
