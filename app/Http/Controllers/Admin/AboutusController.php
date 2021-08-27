<?php

namespace App\Http\Controllers\Admin;

use App\Models\Abouts;
use App\Models\Banner;
use App\Models\TeamMembers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutusController extends Controller
{
    public function index()
    {
        $aboutus = Abouts::all();
        return view('admin.aboutus')->with('aboutus', $aboutus);
    }
    public function showaboutus(Request $request)
    {
        //$aboutus = Abouts::all();
        $banner = new Banner();
        $bannerlist = $banner->findOrFail('3');
        $aboutuss = new Abouts();
        $aboutus = $aboutuss->findOrFail('1');
        //$teammember = new TeamMembers();
        $teamlist = TeamMembers::all();
        $aboutall = array(
            'aboutus' => $aboutus,
            'bannerlist' => $bannerlist,
            'teamlist' => $teamlist
        );
        return view('frontend/aboutus')->with('aboutall', $aboutall);
    }

    public function store(Request $request)
    {
        $aboutus = new Abouts;
        $aboutus->title = $request->input('title');
        $aboutus->subtitle = $request->input('subtitle');
        $aboutus->description = $request->input('description');
        $aboutus->sub_description = $request->input('sub_description');
        $aboutus->save();
        $request->session()->flash('statuscode', 'success');
        return redirect('/abouts')->with('status', 'About us data has been Added.');
    }
    public function edit($id)
    {
        $aboutus = Abouts::findOrFail($id);
        return view('admin.abouts.edit')->with('aboutus', $aboutus);
    }
    public function update(Request $request, $id)
    {
        $aboutus = Abouts::find($id);
        $aboutus->title = $request->input('title');
        $aboutus->subtitle = $request->input('subtitle');
        $aboutus->description = $request->input('description');
        $aboutus->sub_description = $request->input('sub_description');
        $aboutus->update();
        $request->session()->flash('statuscode', 'info');
        return redirect('/abouts')->with('status', 'About us data has been Updated.');
    }
    public function delete(Request $request, $id)
    {
        $aboutus = Abouts::findOrFail($id);
        $aboutus->delete();
        $request->session()->flash('statuscode', 'warning');
        return redirect('abouts')->with('status', 'About us data has been Deleted.');
    }
}
