@extends('layouts.master')
@section('title')
Blog Category Furniture Dashboard
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Add Blog Category
                    <a href="{{url('blog-category')}}" class="float-right btn btn-primary">Back</a>
                </h4>

            </div>
            <div class="card-body">
                <form action="{{ url('/blog-category-store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="blog_cat_title" class="col-form-label">Title:</label>
                                <input name="blog_cat_title" type="text" class="form-control" id="blog_cat_title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="blog_cat_description" class="col-form-label">Description:</label>
                                <textarea name="blog_cat_description" class="form-control"
                                    id="blog_cat_description"></textarea>
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
