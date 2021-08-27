<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::all();
        return view('admin.banner.index')->with('bannerlist', $banner);
    }
    public function create(Request $request)
    {
        return view('admin.banner.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'bannerpic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $banner = new Banner;
        $banner->title = $request->input('title');
        $banner->link = $request->input('link');
        $banner->description = $request->input('description');

        $file = $request->file('bannerpic');
        $extension =  $file->getClientOriginalName();
        $filename = time() . '-' . $extension;
        $file->move(public_path() . '/uploads/banner/', $filename);
        $banner->bannerpic =  $filename;


        $banner->save();
        $request->session()->flash('statuscode', 'success');
        return redirect('/banner')->with('status', 'Banner data has been Added.');
    }
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit')->with('banner', $banner);
    }
    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        $request->validate([
            'title' => 'required',
        ]);

        /*   if ($banner->notHavingImageInDb()){
            $request->validate([
               'bannerpic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

            ]);
        }
        */
        $banner->title = $request->input('title');
        $banner->link = $request->input('link');
        $banner->description = $request->input('description');
        if ($request->hasfile('bannerpic')) {
            $file = $request->file('bannerpic');
            $extension =  $file->getClientOriginalName();
            $filename = time() . '-' . $extension;
            $file->move(public_path() . '/uploads/banner/', $filename);
            $banner->bannerpic =  $filename;
        } else {
            // return $request;
            //   $banner->bannerpic =  "";
        }
        $banner->update();
        $request->session()->flash('statuscode', 'info');
        return redirect('/banner')->with('status', 'Banner data has been Updated.');
    }
    public function delete(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        $request->session()->flash('statuscode', 'warning');
        return redirect('banner')->with('status', 'Banner data has been Deleted.');
    }
}
