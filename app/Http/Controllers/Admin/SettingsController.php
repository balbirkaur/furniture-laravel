<?php

namespace App\Http\Controllers\Admin;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::find('1');
        return view('admin.settings')->with('settings', $settings);
    }
    public function update(Request $request)
    {
        $category = Settings::find('1');
        $category->header_email_id = $request->input('header_email_id');
        $category->header_toll_free = $request->input('header_toll_free');
        $category->facebook_link = $request->input('facebook_link');
        $category->instagram_link = $request->input('instagram_link');
        $category->dribble_link = $request->input('dribble_link');
        $category->google_link = $request->input('google_link');
        $category->twitter_link = $request->input('twitter_link');
        $category->footer_address = $request->input('footer_address');
        $category->footer_phone = $request->input('footer_phone');
        $category->footer_email = $request->input('footer_email');
        $category->footer_opening_hours = $request->input('footer_opening_hours');
        $category->footer_text = $request->input('footer_text');
        $category->save();
        $request->session()->flash('statuscode', 'success');
        return redirect('/settings')->with('status', 'Settings data has been Added.');
    }
}
