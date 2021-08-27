<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProcessList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcessListController extends Controller
{
    public function index()
    {
        $processlist = ProcessList::all();
        return view('admin.process-list.index')->with('processlist', $processlist);
    }

    public function create(Request $request)
    {
        return view('admin.process-list.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'process_title' => 'required'
        ]);
        $category = new ProcessList();
        $category->title = $request->input('process_title');
        $category->description = $request->input('process_description');
        $category->order = $request->input('order');
        if ($request->hasFile('processpic')) {
            $file = $request->file('processpic');
            $extension =  $file->getClientOriginalName();
            $filename = time() . '-' . $extension;
            $file->move(public_path() . '/uploads/process/', $filename);
            $category->processpic =  $filename;
        } else {
            $category->processpic =  "";
        }
        $category->save();
        $request->session()->flash('statuscode', 'success');
        return redirect('/process-list')->with('status', 'Process data has been Added.');
    }
    public function edit($id)
    {
        $process = ProcessList::findOrFail($id);
        return view('admin.process-list.edit', compact('process'));
    }
    public function update(Request $request, $id)
    {
        $services = ProcessList::find($id);
        $request->validate([
            'process_title' => 'required'
        ]);

        $services->title = $request->input('process_title');
        $services->description = $request->input('process_description');
        $services->order = $request->input('order');
        if ($request->hasfile('processpic')) {
            $file = $request->file('processpic');
            $extension =  $file->getClientOriginalName();
            $filename = time() . '-' . $extension;
            $file->move(public_path() . '/uploads/process/', $filename);
            $services->processpic =  $filename;
        } else {
        }
        $services->update();
        $request->session()->flash('statuscode', 'info');
        return redirect('/process-list')->with('status', 'Process data has been Added.');
    }
    public function delete(Request $request, $id)
    {
        $services = ProcessList::findOrFail($id);
        $services->delete();
        return response()->json(['status' => 'Process data has been Deleted.']);
    }
}
