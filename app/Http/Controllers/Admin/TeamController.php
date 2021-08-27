<?php

namespace App\Http\Controllers\Admin;

use App\Models\TeamMembers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index()
    {
        $teammembers = TeamMembers::all();
        return view('admin.teammembers.index')->with('teammembers', $teammembers);
    }
    public function create(Request $request)
    {
        return view('admin.teammembers.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'teampic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $category = new TeamMembers();
        $category->title = $request->input('title');
        $category->position = $request->input('position');
        $category->facebook_link = $request->input('facebook_link');
        $category->instagram_link = $request->input('instagram_link');
        $category->google_link = $request->input('google_link');

        $file = $request->file('teampic');
        $extension =  $file->getClientOriginalName();
        $filename = time() . '-' . $extension;
        $file->move(public_path() . '/uploads/team/', $filename);
        $category->teampic =  $filename;

        $category->save();
        $request->session()->flash('statuscode', 'success');
        return redirect('/teammember-list')->with('status', 'Team data has been Added.');
    }
    public function edit($id)
    {
        $teammembers = TeamMembers::findOrFail($id);
        return view('admin.teammembers.edit', compact('teammembers'));
    }
    public function update(Request $request, $id)
    {
        $services = TeamMembers::find($id);
        $request->validate([
            'title' => 'required'
        ]);

        $services->title = $request->input('title');
        $services->position = $request->input('position');
        $services->facebook_link = $request->input('facebook_link');
        $services->instagram_link = $request->input('instagram_link');
        $services->google_link = $request->input('google_link');
        if ($request->hasfile('teampic')) {
            $file = $request->file('teampic');
            $extension =  $file->getClientOriginalName();
            $filename = time() . '-' . $extension;
            $file->move(public_path() . '/uploads/team/', $filename);
            $services->teampic =  $filename;
        } else {
        }
        $services->update();
        $request->session()->flash('statuscode', 'info');
        return redirect('/teammember-list')->with('status', 'Team data has been Added.');
    }
    public function delete(Request $request, $id)
    {
        $services = TeamMembers::findOrFail($id);
        $services->delete();
        return response()->json(['status' => 'Team data has been Deleted.']);
    }
}
