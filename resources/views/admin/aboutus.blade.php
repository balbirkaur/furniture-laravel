@extends('layouts.master')
@section('title')
Furniture Dashboard
@endsection

@section('content')
<div class="modal fade" id="deletemodalpopup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete AboutUs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="delete_modal" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="modal-body">
                    <input type="hidden" id="delete_aboutus_id">
                    <p>Do you really want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{----Delete Modal----}}
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> About Us
                    <!--<button type="button" class="float-right btn btn-primary" data-toggle="modal"
                        data-target="#addAbout">Add</button>-->
                </h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="datatable">
                        <thead class=" text-primary">
                            <th>
                                Id
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Sub Title
                            </th>

                            <th class="text-right">
                                Edit
                            </th>
                            <!-- <th class="text-right">
                                Delete
                            </th>-->
                        </thead>
                        <tbody>
                            @foreach($aboutus as $data)
                            <tr>
                                <td>
                                    {{ $data->id}}
                                </td>
                                <td>
                                    {{ $data->title}}
                                </td>
                                <td>
                                    {{ $data->subtitle}}
                                </td>

                                <td class="text-right">
                                    <a href="{{ url('/aboutus-edit/'.$data->id) }}" class="btn btn-success">Edit</a>
                                </td>
                                <!--  <td class="text-right"><button type="button" class="btn btn-primary deletebtn"
                                        data-toggle="modal" data-target="#deletemodalpopup">Delete</button>
                                </td>-->
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
<div class="modal fade" id="addAbout" tabindex="-1" aria-labelledby="addAboutLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAboutLabel">Add About Us</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/save-aboutus')}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="title" class="col-form-label">Title:</label>
                        <input name="title" type="text" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="subtitle" class="col-form-label">Sub Title:</label>
                        <input name="subtitle" type="text" class="form-control" id="subtitle">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
