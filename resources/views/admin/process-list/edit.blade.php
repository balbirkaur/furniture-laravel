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
                    <div class="col-md-6">
                        <form method="POST" action="{{ url('/process-update/'.$process->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="process_title" class="form-control"
                                    value="{{$process->title}}">
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Click to upload Image</label>
                                    <input type="file" name="processpic" class="form-control">
                                    @if($process->processpic)
                                    <img src="{{asset('uploads/process/'.$process->processpic)}}">
                                    @else
                                    No Image
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inline">
                                    <label for="featured" class="col-form-label">Order:</label>&nbsp;&nbsp;
                                    1 &nbsp;<input name="order" type="radio" class="form-control" value="1"
                                        @if($process->order=="1")
                                    {{"checked=checked"}} @else @endif>&nbsp;&nbsp;
                                    2 &nbsp;<input name="order" type="radio" class="form-control" value="2"
                                        @if($process->order=="2")
                                    {{"checked=checked"}} @else @endif>&nbsp;&nbsp;
                                    3 &nbsp;<input name="order" type="radio" class="form-control" value="3"
                                        @if($process->order=="3")
                                    {{"checked=checked"}} @else @endif>&nbsp;&nbsp;
                                    4 &nbsp;<input name="order" type="radio" class="form-control" value="4"
                                        @if($process->order=="4")
                                    {{"checked=checked"}} @else @endif>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project Description</label>
                                    <textarea name="process_description" class="form-control" id="process_description"
                                        rows="3">{{$process->description}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Update Project</button>
                            <a href="{{ url('process-list') }}" class="btn btn-danger mb-2">Cancel</a>
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
<!-- Now Ui Dashboard DEMO methods, don't include it in your process! -->
<script src="{{ url('assets/demo/demo.js') }}"></script>
@endsection
