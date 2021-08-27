@extends('layouts.master')
@section('title')
Project Category Furniture Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Add Project
                    <a href="{{url('project-list')}}" class="float-right btn btn-primary">Back</a>
                </h4>

            </div>
            <div class="card-body">
                <form action="{{ url('/project-store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="project_title" class="col-form-label">Title:</label>
                                <input name="project_title" type="text" class="form-control required"
                                    id="project_title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="project_category" class="col-form-label">Category:</label>
                                <select name="proj_cate_id" class="form-control" id="proj_cate_id">
                                    @foreach($projectcategory as $key =>$pcat)
                                    <option value="{{$pcat['id']}}">{{$pcat['project_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectpic" class="col-form-label">Image Upload:</label>
                                <input name="projectpic" type="file" class="form-control" id="projectpic">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" form-inline ">
                                <label for="featured" class="col-form-label">Featured:</label><br>
                                Yes <input name="featured" type="radio" class="form-control" value="Yes">
                                No <input name="featured" type="radio" class="form-control" value="No">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="project_client" class="col-form-label">Client:</label>
                                <input name="project_client" type="text" class="form-control" id="project_client">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="project_acreage" class="col-form-label">Acreage:</label>
                                <input name="project_acreage" type="text" class="form-control" id="project_acreage">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="project_date" class="col-form-label">Date:</label>
                                <input name="project_date" type="date" class="form-control" id="project_date">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="project_description" class="col-form-label">Description:</label>
                                <textarea name="project_description" class="form-control required"
                                    id="project_description"></textarea>
                            </div>

                        </div>
                        <div class="col-md-12"> <button type="submit" class="btn btn-primary">Save</button></div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')

@endsection
