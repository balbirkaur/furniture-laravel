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
                    <a href="{{url('process-list')}}" class="float-right btn btn-primary">Back</a>
                </h4>

            </div>
            <div class="card-body">
                <form action="{{ url('/process-store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="process_title" class="col-form-label">Title:</label>
                                <input name="process_title" type="text" class="form-control required"
                                    id="process_title">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="processpic" class="col-form-label">Image Upload:</label>
                                <input name="processpic" type="file" class="form-control" id="processpic">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" form-inline ">
                                <label for="order" class="col-form-label">Order:</label>&nbsp;&nbsp;
                                1 &nbsp;&nbsp;<input name="order" type="radio" class="form-control" value="1"
                                    checked="checked">&nbsp;&nbsp;
                                2 &nbsp;&nbsp;<input name="order" type="radio" class="form-control"
                                    value="2">&nbsp;&nbsp;
                                3 &nbsp;&nbsp;<input name="order" type="radio" class="form-control"
                                    value="3">&nbsp;&nbsp;
                                4 &nbsp;&nbsp;<input name="order" type="radio" class="form-control" value="4">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="process_description" class="col-form-label">Description:</label>
                                <textarea name="process_description" class="form-control required"
                                    id="process_description"></textarea>
                                <script src="{{ asset('node_module/tinymce/tinymce.js') }}"></script>
                                <script>
                                    tinymce.init({
                                                forced_root_block : false,
                                                selector:'textarea.process_description',
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
