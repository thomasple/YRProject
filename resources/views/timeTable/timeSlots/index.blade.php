@extends('templates/main')

@section('title')
TimeSlots
@endsection

@section('content')
    <div id="register_body" style="text-align: left;">
        <h1 style="text-align: center">List Time Slots</h1>
        <table class="table table-condensed table-striped" id="table">
            <thead>
            <tr>
                <th>Day</th>
                <th>From</th>
                <th>To</th>
                <th>Artisan ID</th>
                <th>Service ID</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Day</th>
                <th>From</th>
                <th>To</th>
                <th>Artisan ID</th>
                <th>Service ID</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($timeslots as $timeslot)
                <tr>
                    <td>{{ $timeslot->day }}</td>
                    <td>{{ $timeslot->from_hour }}</td>
                    <td>{{ $timeslot->to_hour }}</td>
                    <td>{{ $timeslot->artisan_id }}</td>
                    <td>{{ $timeslot->service_id }}</td>
                    <td>{!! link_to_route('timeslot.show', 'Show', [$timeslot->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                    <td>{!! link_to_route('timeslot.edit', 'Edit', [$timeslot->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                    <td>{!! Form::open(['method' => 'DELETE', 'route' => ['timeslot.destroy', $timeslot->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Delete this timeslot?\')']) !!}
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
                    {type: "select", values: ['Mo', 'Tu', 'We','Th','Fr','Sa','Su']},
                    {type: "text"},
                    {type: "text"},
                    {type: "text"},
                    {type: "text"}
                ]
            });
        });
    </script>
@endsection