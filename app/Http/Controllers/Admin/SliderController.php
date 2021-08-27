<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        return view('admin.slider')->with('slider', $slider);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sliderpic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'url'
        ]);

        $slider = new Slider;
        $slider->title = $request->input('title');
        $slider->link = $request->input('link');
        $slider->description = $request->input('description');

        $file = $request->file('sliderpic');
        $extension =  $file->getClientOriginalName();
        $filename = time() . '-' . $extension;
        $file->move(public_path() . '/uploads/slider/', $filename);
        $slider->sliderpic =  $filename;


        $slider->save();
        $request->session()->flash('statuscode', 'success');
        return redirect('/slider')->with('status', 'Slider data has been Added.');
    }
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit')->with('slider', $slider);
    }
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $request->validate([
            'title' => 'required',
            'link' => 'url'
        ]);

     /*   if ($slider->notHavingImageInDb()){
            $request->validate([
               'sliderpic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            
            ]);
        }
        */
        $slider->title = $request->input('title');
        $slider->link = $request->input('link');
        $slider->description = $request->input('description');
        if ($request->hasfile('sliderpic')) {
            $file = $request->file('sliderpic');
            $extension =  $file->getClientOriginalName();
            $filename = time() . '-' . $extension;
            $file->move(public_path() . '/uploads/slider/', $filename);
            $slider->sliderpic =  $filename;
        } else {
            // return $request;
            //   $slider->sliderpic =  "";
        }
        $slider->update();
        $request->session()->flash('statuscode', 'info');
        return redirect('/slider')->with('status', 'Slider data has been Updated.');
    }
    public function delete(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        $request->session()->flash('statuscode', 'warning');
        return redirect('slider')->with('status', 'Slider data has been Deleted.');
    }
}
