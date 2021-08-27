<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeSettingsController extends Controller
{
    public function index()
    {
        $homesettings = HomeSettings::find('1');
        return view('admin.homesettings')->with('homesettings', $homesettings);
    }
    public function update(Request $request)
    {
        $category = HomeSettings::find('1');
        $category->aboutus_text = $request->input('aboutus_text');
        $category->process_text = $request->input('process_text');
        $category->project_text = $request->input('project_text');
        $category->contact_text = $request->input('contact_text');
        $category->save();
        $request->session()->flash('statuscode', 'success');
        return redirect('/homesettings')->with('status', 'Settings data has been Added.');
    }
}
