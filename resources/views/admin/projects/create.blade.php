@extends('layouts.master')
@section('title')
Project Category Furniture Dashboard
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Add Project Category
                <a href="{{url('project-category')}}" class="float-right btn btn-primary" >Back</a>
            </h4>

            </div>
            <div class="card-body">
                <form action="{{ url('/project-category-store')}}" method="POST"  enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6"><div class="form-group">
                        <label for="project_name" class="col-form-label">Title:</label>
                        <input name="project_name" type="text" class="form-control" id="project_name">
                        </div></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="project_description" class="col-form-label">Description:</label>
                            <textarea name="project_description" class="form-control" id="project_description"></textarea>
                        </div>

                    </div>
                    <div class="col-md-12">  <button type="submit" class="btn btn-primary">Save</button></div>
                </div>

                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')

@endsection
