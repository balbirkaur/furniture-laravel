@extends('layouts.master')
@section('title')
Furniture Contact Settings
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
                        <form method="POST" action="{{ url('/contactsettings-update') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control address" id="address"
                                    rows="3">{{$contactsettings->address}}</textarea>

                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" class="form-control phone_number"
                                    id="phone_number" value="{{$contactsettings->phone_number}}">
                            </div>
                            <div class="form-group">
                                <label>Email Id</label>
                                <input type="text" name="email_id" class="form-control email_id" id="email_id"
                                    value="{{$contactsettings->email_id}}">
                            </div>
                            <div class="form-group">
                                <label>Contact Email</label>
                                <input type="text" name="form_email_id" class="form-control form_email_id"
                                    id="form_email_id" value="{{$contactsettings->form_email_id}}">
                            </div>
                            <div class=" form-group">
                                <label>Address Map</label>
                                <textarea name="address_map" class="form-control address_map" id="address_map"
                                    rows="3">{{$contactsettings->address_map}}</textarea>
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
