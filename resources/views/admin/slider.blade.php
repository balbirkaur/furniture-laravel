@extends('layouts.master')
@section('title')
Furniture Dashboard
@endsection

@section('content')
<div class="modal fade" id="deletemodalpopup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="delete_modal" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="modal-body">
                    <input type="hidden" id="delete_slider_id">
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
                <h4 class="card-title"> Slider
                    <button type="button" class="float-right btn btn-primary" data-toggle="modal"
                        data-target="#addAbout">Add</button>
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
                                Link
                            </th>
                            <th>
                                Image
                            </th>
                            <th class="text-right">
                                Edit
                            </th>
                            <th class="text-right">
                                Delete
                            </th>
                        </thead>
                        <tbody>
                            @foreach($slider as $data)
                            <tr>
                                <td>
                                    {{ $data->id}}
                                </td>
                                <td>
                                    {{ $data->title}}
                                </td>
                                <td>
                                    {{ $data->link}}
                                </td>
                                <td>
                                    @if($data->sliderpic)
                                    <img src="{{asset('uploads/slider/'.$data->sliderpic)}}" height="50" width="150">
                                    @else
                                    No Image
                                    @endif
                                </td>
                                <td class="text-right">
                                    <a href="{{ url('/slider-edit/'.$data->id) }}" class="btn btn-success">Edit</a>
                                </td>
                                <td class="text-right"><button type="button" class="btn btn-primary deletebtn"
                                        data-toggle="modal" data-target="#deletemodalpopup">Delete</button>

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
@section('popup')
<div class="modal fade" id="addAbout" tabindex="-1" aria-labelledby="addAboutLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAboutLabel">Add Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              
            </div>
            <div class="alert alert-danger">Don't forget to add image.</div>
            @if(!$errors->isEmpty())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $errorlist)
                    <li>{{$errorlist}}</li>
                    @endforeach

                </ul>
            </div>
            @endif
            <form action="{{ url('/save-slider')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="title" class="col-form-label">Title:</label>
                        <input name="title" type="text" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="sliderpic" class="col-form-label">Image Upload:</label>
                        <input name="sliderpic" type="file" class="form-control" id="sliderpic">

                    </div>
                    <div class="form-group">
                        <label for="subtitle" class="col-form-label">Button Link:</label>
                        <input name="link" type="text" class="form-control" id="link">
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description:</label>
                        <textarea name="description" class="form-control description" id="description"></textarea>
                        <script src="{{ asset('node_module/tinymce/tinymce.js') }}"></script>
                        <script>
                            tinymce.init({
                                forced_root_block : false,
                                        selector:'textarea.description',
                                        width: 400,
                                        height: 300,
                                        toolbar: 'undo redo | styleselect | bold italic | link image',
                                        menubar: 'tools'
                    });
                    // Prevent Bootstrap dialog from blocking focusin
                        $(document).on("focusin", function(e) {
                            if (
                                $(e.target).closest(
                                ".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root"
                                ).length
                            ) {
                                e.stopImmediatePropagation();
                            }
                        });
                        </script>
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
      $('#delete_slider_id').val($.trim(deldata));
      $('#delete_modal').attr("action","{{ url("/slider-delete")}}/"+deldata);
      $('#deletemodalpopup').modal("show");
        });

    });
</script>
@endsection
