@extends('layouts.master')
@section('title')
Service Category Furniture Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Add Service
                    <a href="{{url('service-list')}}" class="float-right btn btn-primary">Back</a>
                </h4>

            </div>
            <div class="card-body">
                <form action="{{ url('/service-store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="service_title" class="col-form-label">Title:</label>
                                <input name="service_title" type="text" class="form-control required"
                                    id="service_title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="serv_cate_id" class="col-form-label">Category:</label>
                                <select name="serv_cate_id" class="form-control" id="serv_cate_id">
                                    @foreach($servicecategory as $key =>$pcat)
                                    <option value="{{$pcat['id']}}">{{$pcat['service_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="servicepic" class="col-form-label">Image Upload:</label>
                                <input name="servicepic" type="file" class="form-control" id="servicepic">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" form-inline ">
                                <label for="featured" class="col-form-label">Featured:</label><br>
                                Yes <input name="featured" type="radio" class="form-control" value="Yes">
                                No <input checked=checked name="featured" type="radio" class="form-control" value="No">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="service_description" class="col-form-label">Description:</label>
                                <textarea name="service_description" class="form-control required"
                                    id="service_description"></textarea>
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
