<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ServiceController extends Controller
{
    public function index()
    {
        $services = ServiceCategory::all();
        return view('admin.services.index')->with('services', $services);
    }
    public function create(Request $request)
    {
        return view('admin.services.create');
    }
    public function store(Request $request)
    {
        $category = new ServiceCategory();
        $category->service_name = $request->input('service_name');
        //  $category->service_slug = Str::slug($request->input('service_name'), "-");
        $category->service_slug = SlugService::createSlug(ServiceCategory::class, 'service_slug', $request->input('service_name'));
        $category->service_description = $request->input('service_description');
        $category->save();
        $request->session()->flash('statuscode', 'success');
        return redirect('/service-category')->with('status', 'Category data has been Added.');
    }
    public function edit($id)
    {
        $services = ServiceCategory::find($id);
        return view('admin.services.edit')->with('services', $services);
    }
    public function update(Request $request, $id)
    {
        $services = ServiceCategory::find($id);
        $services->service_name = $request->input('service_name');
        $services->service_slug = Str::slug($request->input('service_name'), '-');
        $services->service_description = $request->input('service_description');
        $services->update();
        $request->session()->flash('statuscode', 'info');
        return redirect('/service-category')->with('status', 'Category data has been Added.');
    }
    public function delete(Request $request, $id)
    {
        $services = ServiceCategory::findOrFail($id);
        $services->delete();
        return response()->json(['status' => 'Category data has been Deleted.']);
    }
}
