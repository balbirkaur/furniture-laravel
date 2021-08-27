@extends('layouts.master')
@section('title')
Furniture Project Edit
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Edit Project</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ url('/project-update/'.$projects['allprojects']->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="project_title" class="form-control"
                                    value="{{$projects['allprojects']->title}}">
                                <input type="hidden" id="project_id" name="project_id" class="form-control"
                                    value="{{$projects['allprojects']->id}}">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project_category" class="col-form-label">Category:</label>
                                    <select name="proj_cate_id" class="form-control" id="proj_cate_id">
                                        @foreach($projects['allcategories'] as $key =>$pcat)
                                        <option @if ($pcat['id']==$projects['allprojects']->proj_cate_id)
                                            {{"selected=selected"}} @else @endif
                                            value="{{$pcat['id']}}">{{$pcat['project_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Click to upload Image</label>
                                    <input type="file" name="projectpic" class="form-control">
                                    @if($projects['allprojects']->projectpic)
                                    <img src="{{asset('uploads/project/'.$projects['allprojects']->projectpic)}}">
                                    @else
                                    No Image
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Click to upload Additional Images</label>
                                    <div class="alert alert-warning" style="display:none">
                                        <p></p>
                                    </div>

                                    <input type="file" name="projectpics[]" class="form-control" multiple
                                        id="projectpics" placeholder="Post Image" style="position:relative;">

                                    <div> <a class="btn btn-success" id="uploadFile" name='submitImage' />Upload
                                        Additional Images</a></div>
                                    <br />

                                    <div class="row">
                                        @foreach($projects['allimages'] as $key=>$value)
                                        <div class="col-md-4"><img
                                                src="{{asset('uploads/project/'.$value->projectpic)}}" height="150"
                                                width="150"></div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="form-inline">
                                    <label for="featured" class="col-form-label">Featured:</label>&nbsp;&nbsp;
                                    Yes &nbsp;<input name="featured" type="radio" class="form-control" value="Yes"
                                        @if($projects['allprojects']->featured=="Yes")
                                    {{"checked=checked"}} @else @endif>&nbsp;&nbsp;
                                    No &nbsp;<input name="featured" type="radio" class="form-control" value="No"
                                        @if($projects['allprojects']->featured=="No")
                                    {{"checked=checked"}} @else @endif>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project_client" class="col-form-label">Client:</label>
                                    <input name="project_client" value="{{$projects['allprojects']->client}}"
                                        type="text" class="form-control" id="project_client">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project_acreage" class="col-form-label">Acreage:</label>
                                    <input name="project_acreage" value="{{$projects['allprojects']->acreage}}"
                                        type="text" class="form-control" id="project_acreage">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project_date" class="col-form-label">Date:</label>
                                    <input name="project_date" value="{{$projects['allprojects']->project_date}}"
                                        type="date" class="form-control" id="project_date">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project Description</label>
                                    <textarea name="project_description" class="form-control" id="project_description"
                                        rows="3">{{$projects['allprojects']->description}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Update Project</button>
                            <a href="{{ url('project-list') }}" class="btn btn-danger mb-2">Cancel</a>
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

<script type="text/javascript">
    $( document ).ready(function() {
    $("#uploadFile").click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            let image_upload = new FormData;
            let TotalImages = $('#projectpics')[0].files.length; //Total Images
            let images = $('#projectpics')[0];
          //  for (let i = 0; i < TotalImages; i++) {
         //       image_upload.append('images' + i, images.files[i]);
         //   }
            $.each($('#projectpics')[0].files, function(i, file) {
                image_upload.append('images' + i, file);
            });

            image_upload.append('TotalImages', TotalImages);
            image_upload.append('project_id', $('#project_id').val());

            $.ajax({
                url: "{{ url("project-images-store")}}/"+$('#project_id').val(),
                type: 'POST',
                contentType: false,
                processData: false,
                data: image_upload,
                success: function(result) {
                    $("div.alert").show();
                    $("div.alert p").text(result.message);
                    $('#projectpics').val("");
                    setTimeout(function() {
                        $("div.alert").hide();
                    }, 9000); // 9 secs
                }
            });


    });

});
</script>
<script src="{{ url('assets/js/core/popper.min.js') }}"></script>
<script src="{{ url('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ url('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ url('assets/js/plugins/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ url('assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ url('assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ url('assets/demo/demo.js') }}"></script>
@endsection
