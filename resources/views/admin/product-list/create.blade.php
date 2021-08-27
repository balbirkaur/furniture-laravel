@extends('layouts.master')
@section('title')
Product Category Furniture Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Add Product
                    <a href="{{url('product-list')}}" class="float-right btn btn-primary">Back</a>
                </h4>

            </div>
            <div class="card-body">
                @if (Session::has('error'))
                <div class="alert alert-info">
                    {{ Session::get('error') }}
                </div>
                @endif
                <form action="{{ url('/product-store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_title" class="col-form-label">Title:</label>
                                <input name="product_title" type="text" class="form-control required"
                                    id="product_title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_category" class="col-form-label">Category:</label>
                                <select name="prod_cate_id" class="form-control" id="prod_cate_id">
                                    @foreach($productcategory as $key =>$pcat)
                                    <option value="{{$pcat['id']}}">{{$pcat['product_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productpic" class="col-form-label">Image Upload:</label>
                                <input name="productpic" type="file" class="form-control" id="productpic">

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
                                <label for="product_date" class="col-form-label">Date:</label>
                                <input name="product_date" type="date" class="form-control" id="product_date">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product_description" class="col-form-label">Description:</label>
                                <textarea name="product_description" class="form-control required"
                                    id="product_description"></textarea>
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
