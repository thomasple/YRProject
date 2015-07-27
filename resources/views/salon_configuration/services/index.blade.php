@extends('templates/main')

@section('title')
    Salon configuration
@endsection

@section('content')
    <div id="register_body" style="text-align: left;">
        <h1 style="text-align: center">{{ session('salon_chosen_name') }}</h1>
        <h1 style="text-align: center">List Services</h1>

        <table class="table table-condensed table-striped" id="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price (RUR)</th>
                <th>Duration</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Duration</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->price }}</td>
                    <td>{{ $service->duration }} min</td>
                    <td>{!! link_to_route('service.show', 'Show', [$service->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                    <td>{!! link_to_route('service.edit', 'Edit', [$service->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                    <td>{!! Form::open(['method' => 'DELETE', 'route' => ['service.destroy', $service->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Delete this service?\')']) !!}
                        {!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! link_to_route('service.create', 'Create new service', [], ['class' => 'btn btn-info pull-right']) !!}
        <a href="{{ url('/owner/salon-configuration') }}" class="btn btn-primary">
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
                    {type: "number"},
                    {type: "number"},
                ]
            });
        });
    </script>
@endsection