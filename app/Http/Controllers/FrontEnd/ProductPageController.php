<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\Productlist;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class ProductPageController extends Controller
{
    public function show()
    {
        $productlist = Productlist::with('category')->get();
        $prodcategory = ProductCategory::with('categories')->get();
        $banner = new Banner();
        $bannerlist = $banner->findOrFail('7');
        $products = array(
            'allproducts' => $productlist,
            'bannerlist' => $bannerlist,
            'productcategory' => $prodcategory
        );
        return view('frontend.products')->with('productsall', $products);
    }

    public function categoryproduct($category)
    {
        if (empty($category)) {
            $bloglist = Productlist::with('category')->get();
        } else {
            $bloglist = Productlist::where('prod_cate_id', $category)->get();
        }
        $blogrecent =  Productlist::orderBy('id', 'desc')->take(7)->get();
        $blogcategory = ProductCategory::with('categories')->get();
        $banner = new Banner();
        $bannerlist = $banner->findOrFail('7');
        $prodcategory = array(
            'allproducts' => $bloglist,
            'bannerlist' => $bannerlist,
            'productcategory' => $blogcategory,
            'productrecent' => $blogrecent
        );
        return view('frontend.products')->with('productsall', $prodcategory);
    }
    public function singleproduct(Request $request, Productlist $post)
    {
        $projcategory = ProductCategory::with('categories')->get();
        $banner = new Banner();
        $bannerlist = $banner->findOrFail('7');
        $post['product_date'] = date('M d Y', strtotime($post->product_date));
        $productimageslist = DB::table('productimages')->where('product_id', '=', $post['id'])->get();

        $products = array(
            'allproducts' => $post,
            'bannerlist' => $bannerlist,
            'productcategory' => $projcategory,
            'allimages' => $productimageslist
        );

        return view('frontend.productsingle', ['productpost' => $products]);
    }
}
