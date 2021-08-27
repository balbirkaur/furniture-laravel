<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Banner;
use App\Models\Servicelist;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;

class ServicePageController extends Controller
{
    public function show()
    {
        $servicelist = Servicelist::with('category')->get();
        $projcategory = ServiceCategory::with('categories')->get();
        $banner = new Banner();
        $bannerlist = $banner->findOrFail('2');
        $services = array(
            'allservices' => $servicelist,
            'bannerlist' => $bannerlist,
            'servicecategory' => $projcategory
        );
        return view('frontend.services')->with('servicesall', $services);
    }
    public function singleservice(Request $request, Servicelist $post)
    {
        $projcategory = ServiceCategory::with('categories')->get();
        $servicelist = Servicelist::with('category')->get();
        $banner = new Banner();
        $bannerlist = $banner->findOrFail('2');

        $services = array(
            'allservices' => $post,
            'bannerlist' => $bannerlist,
            'servicecategory' => $projcategory,
            'servicelist' => $servicelist
        );

        return view('frontend.servicesingle', ['servicepost' => $services]);
    }
}
