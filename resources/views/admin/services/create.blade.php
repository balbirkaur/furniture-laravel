@extends('layouts.master')
@section('title')
Service Category Furniture Dashboard
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Add Service Category
                    <a href="{{url('service-category')}}" class="float-right btn btn-primary">Back</a>
                </h4>

            </div>
            <div class="card-body">
                <form action="{{ url('/service-category-store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="service_name" class="col-form-label">Title:</label>
                                <input name="service_name" type="text" class="form-control" id="service_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="service_description" class="col-form-label">Description:</label>
                                <textarea name="service_description" class="form-control"
                                    id="service_description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12"><button type="submit" class="btn btn-primary">Save</button></div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')

@endsection
