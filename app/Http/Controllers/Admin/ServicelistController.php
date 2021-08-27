<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Servicelist;

class ServicelistController extends Controller
{
    public function index()
    {
        $servicelist = Servicelist::all();
        return view('admin.service-list.index')->with('servicelist', $servicelist);
    }
    public function create(Request $request)
    {
        $category = new ServiceCategory();
        $categorylist = $category->all();
        return view('admin.service-list.create')->with('servicecategory', $categorylist);
    }
    public function store(Request $request)
    {
        $request->validate([
            'service_title' => 'required',
            'servicepic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $category = new Servicelist();
        $category->serv_cate_id = $request->input('serv_cate_id');
        $category->title = $request->input('service_title');
        $category->slug = SlugService::createSlug(Servicelist::class, 'slug', $request->input('service_title'));
        $category->description = $request->input('service_description');
        $category->featured = $request->input('featured');

        $file = $request->file('servicepic');
        $extension =  $file->getClientOriginalName();
        $filename = time() . '-' . $extension;
        $file->move(public_path() . '/uploads/service/', $filename);
        $category->servicepic =  $filename;

        $category->save();
        $request->session()->flash('statuscode', 'success');
        return redirect('/service-list')->with('status', 'Service data has been Added.');
    }
    public function edit($id)
    {
        $serviceslist = Servicelist::find($id);
        $category = new ServiceCategory();
        $categorylist = $category->all();
        $services = array(
            'allservices' => $serviceslist,
            'allcategories' => $categorylist
        );
        return view('admin.service-list.edit', compact('services'));
    }
    public function update(Request $request, $id)
    {
        $services = Servicelist::find($id);
        $request->validate([
            'service_title' => 'required'
        ]);
        $services->serv_cate_id = $request->input('serv_cate_id');
        $services->title = $request->input('service_title');

        $services->slug = SlugService::createSlug(Servicelist::class, 'slug', $request->input('service_title'));
        $services->description = $request->input('service_description');
        $services->featured = $request->input('featured');
        if ($request->hasfile('servicepic')) {
            $file = $request->file('servicepic');
            $extension =  $file->getClientOriginalName();
            $filename = time() . '-' . $extension;
            $file->move(public_path() . '/uploads/service/', $filename);
            $services->servicepic =  $filename;
        } else {
        }
        $services->update();
        $request->session()->flash('statuscode', 'info');
        return redirect('/service-list')->with('status', 'Service data has been Added.');
    }
    public function delete(Request $request, $id)
    {
        $services = Servicelist::findOrFail($id);
        $services->delete();
        return response()->json(['status' => 'Category data has been Deleted.']);
    }
}
