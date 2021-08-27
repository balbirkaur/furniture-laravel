@extends('layouts.master')
@section('title')
Furniture Project Edit
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Edit Team</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('/teammember-update/'.$teammembers->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{$teammembers->title}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Click to upload Image</label>
                                <input type="file" name="teampic" class="form-control"><br>
                                @if($teammembers->teampic)
                                <img width="170" height="170" src="{{asset('uploads/team/'.$teammembers->teampic)}}">
                                @else
                                No Image
                                @endif

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="position" class="col-form-label">Position:</label>
                                <input name="position" value="{{$teammembers->position}}" type="text"
                                    class="form-control" id="position">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facebook_link" class="col-form-label">Facebook Link:</label>
                                <input name="facebook_link" value="{{$teammembers->facebook_link}}" type="text"
                                    class="form-control" id="facebook_link">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="instagram_link" class="col-form-label">Instagram Link:</label>
                                <input name="instagram_link" value="{{$teammembers->instagram_link}}" type="text"
                                    class="form-control" id="instagram_link">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="google_link" class="col-form-label">Google Link:</label>
                                <input name="google_link" value="{{$teammembers->google_link}}" type="text"
                                    class="form-control" id="google_link">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Update Team</button>
                        <a href="{{ url('teammember-list') }}" class="btn btn-danger mb-2">Cancel</a>
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
