@extends('layouts.master')
@section('title')
Furniture Blog Edit
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Edit Blog</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="{{ url('/blog-update/'.$blogs['allblogs']->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="blog_title" class="form-control"
                                    value="{{$blogs['allblogs']->title}}">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="blog_category" class="col-form-label">Category:</label>
                                    <select name="blog_cate_id" class="form-control" id="blog_cate_id">
                                        @foreach($blogs['allcategories'] as $key =>$pcat)
                                        <option @if ($pcat['id']==$blogs['allblogs']->blog_cate_id)
                                            {{"selected=selected"}} @else @endif
                                            value="{{$pcat['id']}}">{{$pcat['blog_cat_title']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Click to upload Image</label>
                                    <input type="file" name="blogpic" class="form-control">
                                    @if($blogs['allblogs']->blogpic)
                                    <img src="{{asset('uploads/blog/'.$blogs['allblogs']->blogpic)}}">
                                    @else
                                    No Image
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inline">
                                    <label for="featured" class="col-form-label">Featured:</label>&nbsp;&nbsp;&nbsp;
                                    Yes <input name="featured" type="radio" class="form-control" value="Yes"
                                        @if($blogs['allblogs']->featured=="Yes")
                                    {{"checked=checked"}} @else @endif>
                                    No <input name="featured" type="radio" class="form-control" value="No"
                                        @if($blogs['allblogs']->featured=="No")
                                    {{"checked=checked"}} @else @endif>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="blog_excerpt" class="col-form-label">Excerpt:</label>
                                    <textarea name="blog_excerpt" class="form-control required"
                                        id="blog_excerpt">{{$blogs['allblogs']->excerpt}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Blog Description</label>
                                    <textarea name="blog_description" class="form-control blog_description"
                                        id="blog_description" rows="3">{{$blogs['allblogs']->description}}</textarea>
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
                            <button type="submit" class="btn btn-primary mb-2">Update Blog</button>
                            <a href="{{ url('blog-list') }}" class="btn btn-danger mb-2">Cancel</a>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection
@section('scripts')
<script src="{{ url('assets/js/core/jquery.min.js') }}"></script>
<script src="{{ url('assets/js/core/popper.min.js') }}"></script>
<script src="{{ url('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ url('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ url('assets/js/plugins/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ url('assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ url('assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your blog! -->
<script src="{{ url('assets/demo/demo.js') }}"></script>
@endsection
