@extends('layouts.master')
@section('title')
Banner Category Furniture Dashboard
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Add Banner
                    <a href="{{url('banner-list')}}" class="float-right btn btn-primary">Back</a>
                </h4>

            </div>
            <div class="card-body">
                @if(!$errors->isEmpty())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $errorlist)
                        <li>{{$errorlist}}</li>
                        @endforeach

                    </ul>
                </div>
                @endif
                <form action="{{ url('/save-banner')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="title" class="col-form-label">Title:</label>
                            <input name="title" type="text" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="bannerpic" class="col-form-label">Image Upload:</label>
                            <input name="bannerpic" type="file" class="form-control" id="bannerpic">

                        </div>
                        <div class="form-group">
                            <label for="link" class="col-form-label">Button Link:</label>
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
                        <div class="col-md-12"> <button type="submit" class="btn btn-primary">Save</button></div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')

@endsection
