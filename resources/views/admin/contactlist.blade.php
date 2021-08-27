@extends('layouts.master')
@section('title')
Service Furniture Dashboard
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Contact List
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
                                Email Id
                            </th>
                            <th>
                                Message
                            </th>

                            <!--  <th class="text-right">
                                View
                            </th>-->

                        </thead>
                        <tbody>
                            @foreach($contactlist as $data)
                            <tr>
                                <td>
                                    {{ $data->id}}
                                </td>
                                <td>
                                    {{ $data->name}}
                                </td>

                                <td>
                                    {{ $data->email_id}}
                                </td>
                                <td>
                                    {{ $data->message}}
                                </td>
                                <!--  <td class="text-right">
                                    <a href="{{ url('/contact-view/'.$data->id) }}" class="btn btn-success">View</a>
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

@section('scripts')
<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
    });
</script>
@endsection
