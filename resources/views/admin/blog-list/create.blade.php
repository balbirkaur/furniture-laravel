@extends('layouts.master')
@section('title')
Blog Category Furniture Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Add Blog
                    <a href="{{url('blog-list')}}" class="float-right btn btn-primary">Back</a>
                </h4>

            </div>
            <div class="card-body">
                <form action="{{ url('/blog-store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="blog_title" class="col-form-label">Title:</label>
                                <input name="blog_title" type="text" class="form-control required" id="blog_title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="blog_category" class="col-form-label">Category:</label>
                                <select name="blog_cate_id" class="form-control" id="blog_cate_id">
                                    @foreach($blogcategory as $key =>$pcat)
                                    <option value="{{$pcat['id']}}">{{$pcat['blog_cat_title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="blogpic" class="col-form-label">Image Upload:</label>
                                <input name="blogpic" type="file" class="form-control" id="blogpic">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" form-inline ">
                                <label for="featured" class="col-form-label">Featured:</label><br>
                                Yes <input name="featured" type="radio" class="form-control" value="Yes">
                                No <input name="featured" type="radio" class="form-control" value="No" checked>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="blog_excerpt" class="col-form-label">Excerpt:</label>
                                <textarea name="blog_excerpt" class="form-control required"
                                    id="blog_excerpt"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="blog_description" class="col-form-label">Description:</label>
                                <textarea name="blog_description" class="form-control required"
                                    id="blog_description"></textarea>
                                <script src="{{ asset('node_module/tinymce/tinymce.js') }}"></script>
                                <script>
                                    tinymce.init({
                                                forced_root_block : false,
                                                selector:'textarea.blog_description',
                                                width: 900,
                                                height: 300,
                                                plugins: 'link image code',
                                                toolbar: 'undo redo | styleselect | bold italic | link image | code',
                                                menubar: 'tools',
                                                /* without images_upload_url set, Upload tab won't show up*/
                                                images_upload_url: 'postAcceptor.php',
                                                /* we override default upload handler to simulate successful upload*/
                                                images_upload_handler: function (blobInfo, success, failure) {
                                                setTimeout(function () {
                                                    /* no matter what you upload, we will turn it into TinyMCE logo :)*/
                                                    success('http://moxiecode.cachefly.net/tinymce/v9/images/logo.png');
                                                }, 2000);
                                                },
                                                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                                            });
                                </script>
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
