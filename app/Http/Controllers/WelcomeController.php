<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\BlogList;
use App\Models\Settings;
use App\Models\ProcessList;
use App\Models\Projectlist;
use App\Models\Servicelist;
use App\Models\HomeSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class WelcomeController extends Controller
{
    public function index()
    {
        $data = [];  //your empty array
        $data['sliders'] = Slider::all();
        //  $data['projects'] = Projectlist::all();
        $data['projects'] =  Projectlist::where('featured', 'Yes')->orderBy('projectorder', 'asc')->skip(0)->take(7)->get();
        //  $data['projects'] =  Projectlist::where('featured', 'Yes')->orderBy('projectorder', 'asc')->get();
        $data['services'] =  Servicelist::where('featured', 'Yes')->skip(0)->take(3)->get();
        $data['blogs'] =  BlogList::where('featured', 'Yes')->skip(0)->take(3)->get();
        $data['process'] =  ProcessList::all();
        $data['settings'] =  Settings::where('id', 1)->get();
        $data['homesettings'] =  HomeSettings::where('id', 1)->get();
        return view('welcome', compact('data'));
    }
}
