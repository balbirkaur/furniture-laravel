@extends('layouts.master')
@section('title')
Furniture Service Edit
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Edit Service</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="{{ url('/service-update/'.$services['allservices']->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="service_title" class="form-control"
                                    value="{{$services['allservices']->title}}">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="service_category" class="col-form-label">Category:</label>
                                    <select name="serv_cate_id" class="form-control" id="serv_cate_id">
                                        @foreach($services['allcategories'] as $key =>$pcat)
                                        <option @if ($pcat['id']==$services['allservices']->serv_cate_id)
                                            {{"selected=selected"}} @else @endif
                                            value="{{$pcat['id']}}">{{$pcat['service_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Click to upload Image</label>
                                    <input type="file" name="servicepic" class="form-control">
                                    @if($services['allservices']->servicepic)
                                    <img src="{{asset('uploads/service/'.$services['allservices']->servicepic)}}">
                                    @else
                                    No Image
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inline">
                                    <label for="featured" class="col-form-label">Featured:</label>
                                    Yes <input name="featured" type="radio" class="form-control" value="Yes"
                                        @if($services['allservices']->featured=="Yes")
                                    {{"checked=checked"}} @else @endif>
                                    No <input name="featured" type="radio" class="form-control" value="No"
                                        @if($services['allservices']->featured=="No")
                                    {{"checked=checked"}} @else @endif>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Service Description</label>
                                    <textarea name="service_description" class="form-control" id="service_description"
                                        rows="3">{{$services['allservices']->description}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Update Service</button>
                            <a href="{{ url('service-list') }}" class="btn btn-danger mb-2">Cancel</a>
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
<!-- Now Ui Dashboard DEMO methods, don't include it in your service! -->
<script src="{{ url('assets/demo/demo.js') }}"></script>
@endsection
