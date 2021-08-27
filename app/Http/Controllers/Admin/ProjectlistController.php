<?php

namespace App\Http\Controllers\Admin;

use App\Models\Projectlist;
use Illuminate\Http\Request;
use App\Models\ProjectImages;
use App\Models\ProjectCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Intervention\Image\Facades\Image;

class ProjectlistController extends Controller
{
    public function index()
    {
        $projectlist = Projectlist::all();
        return view('admin.project-list.index')->with('projectlist', $projectlist);
    }
    public function create(Request $request)
    {
        $category = new ProjectCategory();
        $categorylist = $category->all();
        return view('admin.project-list.create')->with('projectcategory', $categorylist);
    }
    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }
    public function store(Request $request)
    {
        $request->validate([
            'project_title' => 'required',
            'projectpic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $category = new Projectlist();
        $category->proj_cate_id = $request->input('proj_cate_id');
        $category->title = $request->input('project_title');
        $category->slug = SlugService::createSlug(Projectlist::class, 'slug', $request->input('project_title'));
        $category->description = $request->input('project_description');
        $category->client = $request->input('project_client');
        $category->acreage = $request->input('project_acreage');
        $category->project_date = $request->input('project_date');
        $category->featured = $request->input('featured');

        $file = $request->file('projectpic');
        $filenamewithextension =  $file->getClientOriginalName();
        $filename = time() . '-' . $filenamewithextension;
        $file->move(public_path() . '/uploads/project/', $filename);
        $category->projectpic =  $filename;

        //get file extension
        $extension = $request->file('projectpic')->getClientOriginalExtension();
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //filename to store
        //small thumbnail name
        $smallthumbnail = $filename . '_home_' . time() . '.' . $extension;
        //Upload File
        //   $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);
        $file->storeAs('public/uploads/project/thumbnail', $smallthumbnail);

        //create small thumbnail
        $smallthumbnailpath = public_path('uploads/project/thumbnail/' . $smallthumbnail);
        $this->createThumbnail($smallthumbnailpath, 150, 93);

        $category->save();
        $request->session()->flash('statuscode', 'success');
        return redirect('/project-list')->with('status', 'Project data has been Added.');
    }
    public function edit($id)
    {
        $services = Projectlist::findOrFail($id);
        $category = new ProjectCategory();
        $categorylist = $category->all();
        $projectimageslist = DB::table('projectimages')->where('project_id', '=', $id)->get();
        $projects = array(
            'allprojects' => $services,
            'allcategories' => $categorylist,
            'allimages' => $projectimageslist
        );
        // return view('admin.project-list.edit')->with('projects', $data);
        return view('admin.project-list.edit', compact('projects'));
    }
    public function update(Request $request, $id)
    {
        $services = Projectlist::find($id);
        $request->validate([
            'project_title' => 'required'
        ]);
        $services->proj_cate_id = $request->input('proj_cate_id');
        $services->title = $request->input('project_title');

        $services->slug = SlugService::createSlug(Projectlist::class, 'slug', $request->input('project_title'));
        $services->description = $request->input('project_description');
        $services->client = $request->input('project_client');
        $services->acreage = $request->input('project_acreage');
        $services->project_date = $request->input('project_date');
        $services->featured = $request->input('featured');
        if ($request->hasfile('projectpic')) {
            $file = $request->file('projectpic');
            $filenamewithextension =  $file->getClientOriginalName();
            $filename = time() . '-' . $filenamewithextension;
            $file->move(public_path() . '/uploads/project/', $filename);
            $services->projectpic =  $filename;


            //get file extension
            $extension = $request->file('projectpic')->getClientOriginalExtension();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //filename to store
            //small thumbnail name
            $smallthumbnail = $filename . '_home_' . time() . '.' . $extension;


            //Upload File
            //   $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);
            $file->storeAs('public/uploads/project/thumbnail', $smallthumbnail);

            //create small thumbnail
            $smallthumbnailpath = public_path('uploads/project/thumbnail/' . $smallthumbnail);
            $this->createThumbnail($smallthumbnailpath, 150, 93);
        } else {
        }
        $services->update();
        $request->session()->flash('statuscode', 'info');
        return redirect('/project-list')->with('status', 'Project data has been Added.');
    }
    public function delete(Request $request, $id)
    {
        $services = Projectlist::findOrFail($id);
        $services->delete();
        return response()->json(['status' => 'Project data has been Deleted.']);
    }

    public function imagestore(Request $request, $id)
    {

        if ($request->TotalImages > 0) {

            //Loop for getting files with index like image0, image1
            for ($x = 0; $x < $request->TotalImages; $x++) {

                if ($request->hasFile('images' . $x)) {

                    $file      = $request->file('images' . $x);
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His') . '-' . $filename;

                    //Save files in below folder path, that will make in public folder
                    $file->move(public_path() . '/uploads/project/', $picture);
                    $postArray = ['projectpic' => $picture, 'project_id' => $request->project_id];
                    DB::table('projectimages')->insert($postArray);
                }
            }
            $images = DB::table('projectimages')->orderBy('id', "desc")->get();
            return response()->json(["message" => "Media added successfully.", "images" => $images]);
        } else {
            return response()->json(["message" => "Media missing."]);
        }
    }
}
