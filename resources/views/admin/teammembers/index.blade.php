@extends('layouts.master')
@section('title')
Project Furniture Dashboard
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Team Member List
                    <a href="{{url('teammember-create')}}" class="float-right btn btn-primary">Add</a>
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
                                Name
                            </th>
                            <th>
                                Image
                            </th>
                            <th>
                                Position
                            </th>
                            <th class="text-right">
                                Edit
                            </th>
                            <th class="text-right">
                                Delete
                            </th>
                        </thead>
                        <tbody>
                            @foreach($teammembers as $data)
                            <tr>
                                <td> <input type="hidden" class="serdelete_val" value="{{ $data->id}}">
                                    {{ $data->id}}
                                </td>
                                <td>
                                    {{ $data->title}}
                                </td>
                                <td>
                                    @if($data->teampic)
                                    <img src="{{asset('uploads/team/'.$data->teampic)}}" height="50" width="150">
                                    @else
                                    No Image
                                    @endif
                                </td>

                                <td>
                                    {{ $data->position}}
                                </td>
                                <td class="text-right">
                                    <a href="{{ url('/teammember-edit/'.$data->id) }}" class="btn btn-success">Edit</a>
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
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var data = {
                                    "_token": "{{ csrf_token() }}",
                                    "id":delete_id
                        };
                            $.ajax({
                                type:"DELETE",
                                url: "{{ url("teammember-delete")}}/"+delete_id,
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
