@extends('layouts.master')
@section('title')
Service Category Furniture Dashboard
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Service Category
                    <a href="{{url('service-category-create')}}" class="float-right btn btn-primary">Add</a>
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
                                Category Name
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Description
                            </th>
                            <th class="text-right">
                                Edit
                            </th>
                            <th class="text-right">
                                Delete
                            </th>
                        </thead>
                        <tbody>
                            @foreach($services as $data)
                            <tr>
                                <td> <input type="hidden" class="serdelete_val" value="{{ $data->id}}">
                                    {{ $data->id}}
                                </td>
                                <td>
                                    {{ $data->service_name}}
                                </td>
                                <td>
                                    {{ $data->status}}
                                </td>
                                <td>
                                    {{ $data->service_description}}
                                </td>
                                <td class="text-right">
                                    <a href="{{ url('/service-category-edit/'.$data->id) }}"
                                        class="btn btn-success">Edit</a>
                                </td>
                                <td class="text-right">
                                    <button type="button" class="btn btn-primary deletebtn">Delete</button>

                                </td>
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
<div class="modal fade" id="addService" tabindex="-1" aria-labelledby="addServiceLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addServiceLabel">Add About Us</h5>
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
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description:</label>
                        <textarea name="description" class="form-control" id="description"></textarea>
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

        $('#datatable').on('click','.deletebtn',function(e){
            e.preventDefault();
            var delete_id = $(this).closest('tr').find('.serdelete_val').val();

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var data = {
                                    "_token":$('input[name=_token]').val(),
                                    "id":delete_id
                        };
                            $.ajax({
                                type:"DELETE",
                                url: "{{ url("service-cate-delete")}}/"+delete_id,
                                data:data,
                                success:function(response){
                                    swal("Poof! Your imaginary file has been deleted!", {
                                        icon: "success",
                                        })
                                        .then((willDelete) => {
                                            location.reload();
                                        });
                                }
                            });

                    }
                });
            });
        });
</script>
@endsection
