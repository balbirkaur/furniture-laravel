@extends('layouts.master')
@section('title')
Furniture User Edit
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Edit Slider</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @if(!$errors->isEmpty())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $errorlist)
                                <li>{{$errorlist}}</li>
                                @endforeach

                            </ul>
                        </div>
                        @endif
                        <form method="POST" action="{{ url('/slider-update/'.$slider->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{$slider->title}}">
                            </div>
                            <div class="form-group">
                                <label>Button Link</label>
                                <input type="text" name="link" class="form-control" value="{{$slider->link}}">
                            </div>
                            <div class="form-group">
                                <label>Click to upload Image</label>
                                <input type="file" name="sliderpic" class="form-control">
                                @if($slider->sliderpic)
                                <img src="{{asset('uploads/slider/'.$slider->sliderpic)}}">
                                @else
                                No Image
                                @endif

                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control description" id="description"
                                    rows="3">{{$slider->description}}</textarea>
                                <script src="{{ asset('node_module/tinymce/tinymce.js') }}"></script>
                                <script>
                                    tinymce.init({
                                        forced_root_block : false,
                                        selector:'textarea.description',
                                        width: 900,
                                        height: 300,
                                        plugins: 'code',
                                        toolbar: 'undo redo | styleselect | bold italic | link image | code',
                                        menubar: 'tools'
                    });
                                </script>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Update Slider</button>
                            <a href="{{ url('slider') }}" class="btn btn-danger mb-2">Cancel</a>
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
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ url('assets/demo/demo.js') }}"></script>
@endsection
