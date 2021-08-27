<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Banner;
use App\Models\BlogList;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogPageController extends Controller
{
    public function show()
    {
        $bloglist = BlogList::with('category')->get();
        $blogrecent =  BlogList::orderBy('id', 'desc')->take(7)->get();
        $blogcategory = BlogCategory::with('categories')->get();
        $banner = new Banner();
        $bannerlist = $banner->findOrFail('4');
        $blogs = array(
            'allblogs' => $bloglist,
            'bannerlist' => $bannerlist,
            'blogcategory' => $blogcategory,
            'blogrecent' => $blogrecent
        );
        return view('frontend.blogs')->with('blogsall', $blogs);
    }
    public function categoryblog($category)
    {
        if (empty($category)) {
            $bloglist = BlogList::with('category')->get();
        } else {
            $bloglist = BlogList::where('blog_cate_id', $category)->get();
        }
        $blogrecent =  BlogList::orderBy('id', 'desc')->take(7)->get();
        $blogcategory = BlogCategory::with('categories')->get();
        $banner = new Banner();
        $bannerlist = $banner->findOrFail('4');
        $blogs = array(
            'allblogs' => $bloglist,
            'bannerlist' => $bannerlist,
            'blogcategory' => $blogcategory,
            'blogrecent' => $blogrecent
        );
        return view('frontend.blogs')->with('blogsall', $blogs);
    }
    public function singleblog(Request $request, BlogList $post)
    {
        $blogcategory = BlogCategory::with('categories')->get();
        $blogrecent =  BlogList::orderBy('id', 'desc')->take(7)->get();
        $banner = new Banner();
        $bannerlist = $banner->findOrFail('4');
        $post['blog_date'] = date('M d Y', strtotime($post->blog_date));

        $blogs = array(
            'allblogs' => $post,
            'bannerlist' => $bannerlist,
            'blogcategory' => $blogcategory,
            'blogrecent' => $blogrecent
        );

        return view('frontend.blogsingle', ['blogsall' => $blogs]);
    }
}
