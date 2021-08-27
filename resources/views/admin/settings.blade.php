@extends('layouts.master')
@section('title')
Furniture Settings
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Website Settings</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="{{ url('/settings-update') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Header Email Id</label>
                                <input type="email" name="header_email_id" class="form-control"
                                    value="{{$settings->header_email_id}}">
                            </div>
                            <div class="form-group">
                                <label>Header Toll Free</label>
                                <input type="text" name="header_toll_free" class="form-control"
                                    value="{{$settings->header_toll_free}}">
                            </div>
                            <div class="form-group">
                                <label>Facebook Link</label>
                                <input type="text" name="facebook_link" class="form-control"
                                    value="{{$settings->facebook_link}}">
                            </div>
                            <div class="form-group">
                                <label>Instagram Link</label>
                                <input type="text" name="instagram_link" class="form-control"
                                    value="{{$settings->instagram_link}}">
                            </div>
                            <div class="form-group">
                                <label>Dribble Link</label>
                                <input type="text" name="dribble_link" class="form-control"
                                    value="{{$settings->dribble_link }}">
                            </div>
                            <div class="form-group">
                                <label>Google Link</label>
                                <input type="text" name="google_link" class="form-control"
                                    value="{{$settings->google_link}}">
                            </div>
                            <div class="form-group">
                                <label>Twitter Link</label>
                                <input type="text" name="twitter_link" class="form-control"
                                    value="{{$settings->twitter_link}}">
                            </div>
                            <div class="form-group">
                                <label>Footer Address</label>
                                <input type="text" name="footer_address" class="form-control"
                                    value="{{$settings->footer_address}}">
                            </div>
                            <div class="form-group">
                                <label>Footer Phone Number</label>
                                <input type="text" name="footer_phone" class="form-control"
                                    value="{{$settings->footer_phone}}">
                            </div>
                            <div class="form-group">
                                <label>Footer Email Id</label>
                                <input type="text" name="footer_email" class="form-control"
                                    value="{{$settings->footer_email}}">
                            </div>
                            <div class="form-group">
                                <label>Footer Opening Hours</label>
                                <input type="text" name="footer_opening_hours" class="form-control"
                                    value="{{$settings->footer_opening_hours}}">
                            </div>
                            <div class="form-group">
                                <label>Footer Text</label>
                                <textarea name="footer_text" class="form-control">{{$settings->footer_text}}
                                </textarea>
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
