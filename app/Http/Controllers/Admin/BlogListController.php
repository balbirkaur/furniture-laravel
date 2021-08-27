<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogList;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogListController extends Controller
{
    public function index()
    {
        $bloglist = BlogList::all();
        return view('admin.blog-list.index')->with('bloglist', $bloglist);
    }

    public function create(Request $request)
    {
        $category = new BlogCategory();
        $categorylist = $category->all();
        return view('admin.blog-list.create')->with('blogcategory', $categorylist);
    }
    public function store(Request $request)
    {
        $request->validate([
            'blog_title' => 'required'
        ]);
        $category = new BlogList();
        $category->title = $request->input('blog_title');
        $category->blog_cate_id = $request->input('blog_cate_id');
        $category->description = $request->input('blog_description');
        $category->excerpt = $request->input('blog_excerpt');
        $category->featured = $request->input('featured');

        if ($request->hasFile('blogpic')) {
            $file = $request->file('blogpic');
            $extension =  $file->getClientOriginalName();
            $filename = time() . '-' . $extension;
            $file->move(public_path() . '/uploads/blog/', $filename);
            $category->blogpic =  $filename;
        } else {
            $category->blogpic =  "";
        }
        $category->save();
        $request->session()->flash('statuscode', 'success');
        return redirect('/blog-list')->with('status', 'Process data has been Added.');
    }
    public function edit($id)
    {
        $services = BlogList::findOrFail($id);
        $category = new BlogCategory();
        $categorylist = $category->all();
        $blogs = array(
            'allblogs' => $services,
            'allcategories' => $categorylist
        );
        return view('admin.blog-list.edit', compact('blogs'));
    }
    public function update(Request $request, $id)
    {
        $services = BlogList::find($id);
        $request->validate([
            'blog_title' => 'required'
        ]);

        $services->title = $request->input('blog_title');
        $services->description = $request->input('blog_description');
        $services->excerpt = $request->input('blog_excerpt');
        $services->featured = $request->input('featured');
        if ($request->hasfile('blogpic')) {
            $file = $request->file('blogpic');
            $extension =  $file->getClientOriginalName();
            $filename = time() . '-' . $extension;
            $file->move(public_path() . '/uploads/blog/', $filename);
            $services->blogpic =  $filename;
        } else {
        }
        $services->update();
        $request->session()->flash('statuscode', 'info');
        return redirect('/blog-list')->with('status', 'Process data has been Added.');
    }
    public function delete(Request $request, $id)
    {
        $services = BlogList::findOrFail($id);
        $services->delete();
        return response()->json(['status' => 'Process data has been Deleted.']);
    }
}
