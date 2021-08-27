@extends('layouts.master')
@section('title')
Furniture User Edit
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Edit About Us</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="{{ url('/service-category-update/'.$services->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="service_name" class="form-control"
                                    value="{{$services->service_name}}">
                            </div>

                            <div class="form-group">
                                <label>Service Description</label>
                                <textarea name="service_description" class="form-control" id="service_description"
                                    rows="3">{{$services->service_description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Update Service</button>
                            <a href="{{ url('service-category') }}" class="btn btn-danger mb-2">Cancel</a>
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
