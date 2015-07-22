@extends('templates/main')

@section('title')
    Reservations
@endsection

@section('content')
<div id="register_body" style="text-align: left;">
    <h1 style="text-align: center">List Reservations</h1>

    <table class="table table-condensed table-striped" id="table">
        <thead>
        <tr>
            <th>Start</th>
            <th>End</th>
            <th>Client ID</th>
            <th>Artisan-Service ID</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Start</th>
            <th>End</th>
            <th>Client ID</th>
            <th>Artisan-Service ID</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </tfoot>
        <tbody>
        @foreach($reservations as $reservation)
        <tr>
            <td>{{ $reservation->start }}</td>
            <td>{{ $reservation->end }}</td>
            <td>{{ $reservation->client_id }}</td>
            <td>{{ $reservation->artisan_service_id }}</td>
            <td>{!! link_to_route('reservation.show', 'Show', [$reservation->id], ['class' => 'btn btn-success btn-block']) !!}</td>
            <td>{!! link_to_route('reservation.edit', 'Edit', [$reservation->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
            <td>{!! Form::open(['method' => 'DELETE', 'route' => ['reservation.destroy', $artisan->id]]) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Delete this reservation?\')']) !!}
                {!! Form::close() !!}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script')

    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="{{url('/vendor/jquery.dataTables.columnFilter.js')}}"></script>
    <script src='//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js'></script>

    <script>
        $(document).ready(function () {
            $('#table').dataTable({
                ordering: false
            }).columnFilter({
                aoColumns: [
                    {type: "text"},
                    {type: "text"},
                    {type: "text"},
                    {type: "text"},
                ]
            });
        });
    </script>
@endsection