<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $blogcategory = BlogCategory::all();
        return view('admin.blog-category.index')->with('blogcategory', $blogcategory);
    }
    public function create(Request $request)
    {
        return view('admin.blog-category.create');
    }
    public function store(Request $request)
    {
        $category = new BlogCategory();
        $category->blog_cat_title = $request->input('blog_cat_title');
        $category->blog_cat_slug = Str::slug($request->input('blog_cat_title'), "-");
        $category->blog_cat_description = $request->input('blog_cat_description');
        $category->save();
        $request->session()->flash('statuscode', 'success');
        return redirect('/blog-category')->with('status', 'Category data has been Added.');
    }
    public function edit($id)
    {
        $blogcategory = BlogCategory::findOrFail($id);
        return view('admin.blog-category.edit')->with('blogcategory', $blogcategory);
    }
    public function update(Request $request, $id)
    {
        $projects = BlogCategory::find($id);
        $projects->blog_cat_title = $request->input('blog_cat_title');
        $projects->blog_cat_slug = Str::slug($request->input('blog_cat_title'), '-');
        $projects->blog_cat_description = $request->input('blog_cat_description');
        $projects->update();
        $request->session()->flash('statuscode', 'info');
        return redirect('/blog-category')->with('status', 'Category data has been Added.');
    }
    public function delete(Request $request, $id)
    {
        $projects = BlogCategory::findOrFail($id);
        $projects->delete();
        return response()->json(['status' => 'Category data has been Deleted.']);
    }
}
