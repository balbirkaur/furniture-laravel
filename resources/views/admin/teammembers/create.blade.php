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
                    <a href="{{url('teammember-list')}}" class="float-right btn btn-primary">Back</a>
                </h4>

            </div>
            <div class="card-body">
                <form action="{{ url('/teammember-store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Title:</label>
                                <input name="title" type="text" class="form-control required" id="title">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="teampic" class="col-form-label">Image Upload:</label>
                                <input name="teampic" type="file" class="form-control" id="teampic">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="position" class="col-form-label">Position:</label>
                                <input name="position" type="text" class="form-control" id="position">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facebook_link" class="col-form-label">Facebook Link:</label>
                                <input name="facebook_link" type="text" class="form-control" id="facebook_link">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="instagram_link" class="col-form-label">Instagram Link:</label>
                                <input name="instagram_link" type="text" class="form-control" id="instagram_link">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="google_link" class="col-form-label">Google Link:</label>
                                <input name="google_link" type="text" class="form-control" id="google_link">
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
