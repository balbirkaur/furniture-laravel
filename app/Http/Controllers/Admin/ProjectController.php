<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = ProjectCategory::all();
        return view('admin.projects.index')->with('projects', $projects);
    }
    public function create(Request $request)
    {
        return view('admin.projects.create');
    }
    public function store(Request $request)
    {
        $category = new ProjectCategory();
        $category->project_name = $request->input('project_name');
        $category->project_slug = Str::slug($request->input('project_name'), "-");
        $category->project_description = $request->input('project_description');
        $category->save();
        $request->session()->flash('statuscode', 'success');
        return redirect('/project-category')->with('status', 'Category data has been Added.');
    }
    public function edit($id)
    {
        $projects = ProjectCategory::findOrFail($id);
        return view('admin.projects.edit')->with('projects', $projects);
    }
    public function update(Request $request, $id)
    {
        $projects = ProjectCategory::find($id);
        $projects->project_name = $request->input('project_name');
        $projects->project_slug = Str::slug($request->input('project_name'), '-');
        $projects->project_description = $request->input('project_description');
        $projects->update();
        $request->session()->flash('statuscode', 'info');
        return redirect('/project-category')->with('status', 'Category data has been Added.');
    }
    public function delete(Request $request, $id)
    {
        $projects = ProjectCategory::findOrFail($id);
        $projects->delete();
        return response()->json(['status' => 'Category data has been Deleted.']);
    }
}
