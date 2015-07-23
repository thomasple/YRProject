@extends('templates/main')

@section('title')
    Holidays
@endsection

@section('content')
    <div id="register_body" style="text-align: left;">
        <h1 style="text-align: center">List Holidays</h1>

        <table class="table table-condensed table-striped" id="table">
            <thead>
            <tr>
                <th>Artisan ID</th>
                <th>Start</th>
                <th>End</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Artisan ID</th>
                <th>Start</th>
                <th>End</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($holidays as $holiday)
                <tr>
                    <td>{{ $holiday->artisan_id }}</td>
                    <td>{{ $holiday->start }}</td>
                    <td>{{ $holiday->end }}</td>
                    <td>{!! link_to_route('holiday.show', 'Show', [$holiday->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                    <td>{!! link_to_route('holiday.edit', 'Edit', [$holiday->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                    <td>{!! Form::open(['method' => 'DELETE', 'route' => ['holiday.destroy', $holiday->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Delete this holiday?\')']) !!}
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
                ]
            });
        });
    </script>
@endsection