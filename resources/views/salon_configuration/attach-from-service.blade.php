@extends('templates/main')

@section('title')
    Salon configuration
@endsection

@section('content')
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">Artisans providing service : {{ $service->name }}</h1>
        <table class="table table-condensed table-striped" id="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Specialty</th>
                <th></th>
                <th></th>

            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Specialty</th>
                <th></th>
                <th></th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($artisans as $artisan)
                <tr style="background-color:
                @if(!in_array($artisan->id, $artisansAttachedToService))
                        red
                @else
                        green
                @endif
                        ;">
                    <td>{{ $artisan->first_name }} {{ $artisan->last_name }}</td>
                    <td>{{ $artisan->specialty }}</td>
                    <td>@if(!in_array($artisan->id, $artisansAttachedToService))
                            <a class="btn btn-success btn-block attach"
                               onclick="$.get('{!! url('/attach-artisan-service/'.$artisan->id.'/'.$service->id) !!}', function (data) {
                                       if (data.response == 'ok') {
                                       javascript:window.location.reload();
                                       }
                                       });">
                                Attach</a>
                        @else
                            <a class="btn btn-success btn-block attach"
                               onclick="$.get('{!! url('/detach-artisan-service/'.$artisan->id.'/'.$service->id) !!}', function (data) {
                                       if (data.response == 'ok') {
                                       javascript:window.location.reload();
                                       }
                                       });">
                                Detach</a>
                        @endif
                    </td>
                    <td>{!! link_to_route('artisan.show', 'Show', [$artisan->id], ['class' => 'btn btn-info btn-block']) !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ url('/service/'.$service->id) }}" class="btn btn-primary pull-left">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
        </a>
        @endsection

        @section('script')
            <script type="text/javascript" charset="utf8"
                    src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
            <script type="text/javascript" charset="utf8"
                    src="{{url('/vendor/jquery.dataTables.columnFilter.js')}}"></script>
            <script src='//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js'></script>

            <script>
                $(document).ready(function () {
                    $('#table').dataTable({
                        ordering: true
                    }).columnFilter({
                        aoColumns: [
                            {type: "text"},
                            {type: "text"},
                            {type: "text"}
                        ]
                    });
                });
            </script>
@endsection