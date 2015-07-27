@extends('templates/main')

@section('title')
    Artisans
@endsection

@section('content')
    <div id="register_body" style="text-align: left;">
        <h1 style="text-align: center">List Salons</h1>
        <table class="table table-condensed table-striped" id="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Owner</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Owner</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($salons as $salon)
                <tr>
                    <td>{{ $salon->name }}</td>
                    <td>{{ $salon->user->first_name.' '.$salon->user->last_name }}</td>
                    <td>{!! link_to_route('salon.show', 'Show', [$salon->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                    <td>{!! link_to_route('salon.edit', 'Edit', [$salon->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                    <td>{!! Form::open(['method' => 'DELETE', 'route' => ['salon.destroy', $salon->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Delete this salon and all its artisans and services?\')']) !!}
                        {!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! link_to_route('salon.create', 'Create new salon', [], ['class' => 'btn btn-info pull-right']) !!}
        <a href="{{ url('/administrator') }}" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
        </a>
    </div>
@endsection

@section('script')

    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="{{url('/vendor/jquery.dataTables.columnFilter.js')}}"></script>
    <script src='//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js'></script>

    <script>
        $(document).ready(function () {
            $('#table').dataTable({
                ordering: true
            }).columnFilter({
                aoColumns: [
                    {type: "text"},
                    {type: "text"}
                ]
            });
        });
    </script>
@endsection