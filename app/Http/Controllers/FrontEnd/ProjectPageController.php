<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\Projectlist;
use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class ProjectPageController extends Controller
{
    public function show()
    {
        // $projectlist = Projectlist::all();

        $projectlist = Projectlist::with('category')->get();
        /* $projcategory = DB::table('projectlists')->join('projectcategories', 'projectlists.proj_cate_id', '=', 'projectcategories.id')
            ->select('projectcategories.id', 'projectcategories.project_name')
            ->groupBy('projectlists.proj_cate_id')->get();*/
        $projcategory = ProjectCategory::with('categories')->get();
        $banner = new Banner();
        $bannerlist = $banner->findOrFail('5');
        $projects = array(
            'allprojects' => $projectlist,
            'bannerlist' => $bannerlist,
            'projectcategory' => $projcategory
        );
        // return view('admin.project-list.edit')->with('projects', $data);
        return view('frontend.projects')->with('projectsall', $projects);
    }
    public function singleproject(Request $request, Projectlist $post)
    {
        $projcategory = ProjectCategory::with('categories')->get();
        $banner = new Banner();
        $bannerlist = $banner->findOrFail('5');
        $post['project_date'] = date('M d Y', strtotime($post->project_date));
        $projectimageslist = DB::table('projectimages')->where('project_id', '=', $post['id'])->get();

        $projects = array(
            'allprojects' => $post,
            'bannerlist' => $bannerlist,
            'projectcategory' => $projcategory,
            'allimages' => $projectimageslist
        );

        return view('frontend.projectsingle', ['projectpost' => $projects]);
    }
}
