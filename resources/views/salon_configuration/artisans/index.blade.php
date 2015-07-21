@extends('templates/main')

@section('title')
    Artisans
@endsection

@section('content')
    <div id="register_body" style="text-align: left;">
        <h1 style="text-align: center">List Artisans</h1>

        <table class="table table-condensed table-striped" id="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Specialty</th>
                <th>Salon</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Specialty</th>
                <th>Salon</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($artisans as $artisan)
                <tr>
                    <td>{{ $artisan->first_name }} {{ $artisan->last_name }}</td>
                    <td>{{ $artisan->email }}</td>
                    <td>{{ $artisan->sex }}</td>
                    <td>{{ $artisan->specialty }}</td>
                    <td>{{ $artisan->salon_id }}</td>
                    <td>{!! link_to_route('artisan.show', 'Show', [$artisan->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                    <td>{!! link_to_route('artisan.edit', 'Edit', [$artisan->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                    <td>{!! Form::open(['method' => 'DELETE', 'route' => ['artisan.destroy', $artisan->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Delete this artisan?\')']) !!}
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
                    {type: "select", values: ['M', 'F']},
                    {type: "text"},
                    {type: "text"}
                ]
            });
        });
    </script>
@endsection