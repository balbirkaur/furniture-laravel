@extends('layouts.master')
@section('title')
Furniture Home Settings
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Home Page Settings</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="{{ url('/homesettings-update') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>About Us Text</label>
                                <textarea name="aboutus_text" class="form-control aboutus_text" id="aboutus_text"
                                    rows="3">{{$homesettings->aboutus_text}}</textarea>
                                <script src="{{ asset('node_module/tinymce/tinymce.js') }}"></script>
                                <script>
                                    tinymce.init({
                                        forced_root_block : false,
                                        selector:'textarea.aboutus_text',
                                        extended_valid_elements: 'span',
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
                            <div class="form-group">
                                <label>Process Text</label>
                                <textarea name="process_text" class="form-control process_text" id="process_text"
                                    rows="3">{{$homesettings->process_text}}</textarea>

                                <script>
                                    tinymce.init({
                                        forced_root_block : false,
                                        selector:'textarea.process_text',
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
                            <div class="form-group">
                                <label>Project Text</label>
                                <textarea name="project_text" class="form-control project_text" id="project_text"
                                    rows="3">{{$homesettings->project_text}}</textarea>

                                <script>
                                    tinymce.init({
                                        forced_root_block : false,
                                        selector:'textarea.project_text',
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

                            <div class="form-group">
                                <label>Contact Text</label>
                                <textarea name="contact_text" class="form-control contact_text" id="contact_text"
                                    rows="3">{{$homesettings->contact_text}}</textarea>

                                <script>
                                    tinymce.init({
                                        forced_root_block : false,
                                        selector:'textarea.contact_text',
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
                            <button type="submit" class="btn btn-primary mb-2">Update Settings</button>
                            <a href="{{ url('settings') }}" class="btn btn-danger mb-2">Cancel</a>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection

@section('scripts')
<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
        $('#datatable').on('click','.deletebtn',function(){
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();
      //  console.log(data);
      let deldata = $.trim(data[0]);
      $('#delete_aboutus_id').val($.trim(deldata));
      $('#delete_modal').attr("action","{{ url("/aboutus-delete")}}/"+deldata);
      $('#deletemodalpopup').modal("show");
        });
    });
</script>
@endsection
