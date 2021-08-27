<?php

namespace App\Http\Controllers\Admin;

use App\Models\Productlist;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Cviebrock\EloquentSluggable\Services\SlugService;


class ProductlistController extends Controller
{
    public function index()
    {
        $productlist = Productlist::all();
        return view('admin.product-list.index')->with('productlist', $productlist);
    }
    public function create(Request $request)
    {
        $product = new ProductCategory();
        $productlist = $product->all();
        return view('admin.product-list.create')->with('productcategory', $productlist);
    }
    public function createThumbnail($real_path, $path, $width, $height)
    {
        $img = Image::make($real_path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_title' => 'required',
            'productpic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $product = new Productlist();
        $product->prod_cate_id = $request->input('prod_cate_id');
        $product->title = $request->input('product_title');
        $product->slug = SlugService::createSlug(Productlist::class, 'slug', $request->input('product_title'));
        $product->description = $request->input('product_description');
        $product->product_date = $request->input('product_date');
        $product->featured = $request->input('featured');

        if ($request->hasfile('productpic')) {
            $file = $request->file('productpic');
            $filenamewithextension =  $file->getClientOriginalName();
            $filename = time() . '-' . $filenamewithextension;
            $product->productpic =  $filename;

            //get file extension
            $extension = $request->file('productpic')->getClientOriginalExtension();
            //get filename without extension
            $filename2 = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $smallthumbnail = "home_" . $filename;
            $path = public_path('uploads/product/thumbnail');

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0775, true, true);
            }
            //create small thumbnail
            $smallthumbnailpath = public_path('uploads/product/thumbnail/' . $smallthumbnail);

            if (!File::exists($smallthumbnailpath)) {
                $this->createThumbnail($request->file('productpic')->getRealPath(), $smallthumbnailpath, 150, 93);
            }
        } else {
            $request->session()->flash('error', 'Upload the Product Image');
        }
        $file->move(public_path() . '/uploads/product/', $filename);
        $product->save();
        $request->session()->flash('statuscode', 'success');
        return redirect('/product-list')->with('status', 'Product data has been Added.');
    }
    public function edit($id)
    {
        $services = Productlist::findOrFail($id);
        $product = new ProductCategory();
        $productlist = $product->all();
        $productimageslist = DB::table('productimages')->where('product_id', '=', $id)->get();
        $products = array(
            'allproducts' => $services,
            'allcategories' => $productlist,
            'allimages' => $productimageslist
        );
        // return view('admin.product-list.edit')->with('products', $data);
        return view('admin.product-list.edit', compact('products'));
    }
    public function update(Request $request, $id)
    {
        $services = Productlist::find($id);
        $request->validate([
            'product_title' => 'required'
        ]);
        $services->prod_cate_id = $request->input('prod_cate_id');
        $services->title = $request->input('product_title');

        $services->slug = SlugService::createSlug(Productlist::class, 'slug', $request->input('product_title'));
        $services->description = $request->input('product_description');
        $services->product_date = $request->input('product_date');
        $services->featured = $request->input('featured');

        if ($request->hasfile('productpic')) {
            $file = $request->file('productpic');
            $filenamewithextension =  $file->getClientOriginalName();
            $filename = time() . '-' . $filenamewithextension;
            $services->productpic =  $filename;

            //get file extension
            $extension = $request->file('productpic')->getClientOriginalExtension();
            //get filename without extension
            $filename2 = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $smallthumbnail = "home_" . $filename;
            $path = public_path('uploads/product/thumbnail');

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0775, true, true);
            }
            //create small thumbnail
            $smallthumbnailpath = public_path('uploads/product/thumbnail/' . $smallthumbnail);

            if (!File::exists($smallthumbnailpath)) {
                $this->createThumbnail($request->file('productpic')->getRealPath(), $smallthumbnailpath, 150, 93);
            }
        } else {
            $request->session()->flash('error', 'Upload the Product Image');
        }
        $file->move(public_path() . '/uploads/product/', $filename);
        $services->update();
        $request->session()->flash('statuscode', 'info');
        return redirect('/product-list')->with('status', 'Product data has been Added.');
    }
    public function delete(Request $request, $id)
    {
        $services = Productlist::findOrFail($id);
        $services->delete();
        return response()->json(['status' => 'Product data has been Deleted.']);
    }

    public function imagestore(Request $request, $id)
    {

        if ($request->TotalImages > 0) {

            //Loop for getting files with index like image0, image1
            for ($x = 0; $x < $request->TotalImages; $x++) {

                if ($request->hasFile('images' . $x)) {

                    $file      = $request->file('images' . $x);
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His') . '-' . $filename;

                    //Save files in below folder path, that will make in public folder
                    $file->move(public_path() . '/uploads/product/', $picture);
                    $postArray = ['productpic' => $picture, 'product_id' => $request->product_id];
                    DB::table('productimages')->insert($postArray);
                }
            }
            $images = DB::table('productimages')->orderBy('id', "desc")->get();
            return response()->json(["message" => "Media added successfully.", "images" => $images]);
        } else {
            return response()->json(["message" => "Media missing."]);
        }
    }
}
