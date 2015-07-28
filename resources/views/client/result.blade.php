@extends('templates/main')

@section('title')
    Salon configuration
@endsection

@section('content')
    <div id="register_body" style="text-align: left;">
        <h1 style="text-align: center">{{ session('salon_chosen_name') }}</h1>
        <h1 style="text-align: center">List Artisans</h1>

        <table class="table table-condensed table-striped" id="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Specialty</th>
                <th>Service</th>
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
                <th>Service</th>
                <th>Salon</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($artisans_services as $artisan_service)
            <tr>
                <td>{{$artisan_service['artisan']->first_name }} {{ Artisan::find($artisan_service->artisan_id)->last_name }}</td>
                    <td>{{ $artisan_service['artisan']->email }}</td>
                    <td>{{ $artisan_service['artisan']->sex }}</td>
                    <td>{{ $artisan_service['artisan']->specialty }}</td>
                    <td>{{ $artisan_service['service']->name }}</td>
                    <td>{{ $artisan_service['artisan']->salon }}</td>
                    {{--<td>{!! link_to_route('artisan.show', 'Show', [$artisan->id], ['class' => 'btn btn-success btn-block']) !!}</td>--}}
                    {{--<td>{!! link_to_route('artisan.edit', 'Edit', [$artisan->id], ['class' => 'btn btn-warning btn-block']) !!}</td>--}}
                    {{--<td>{!! Form::open(['method' => 'DELETE', 'route' => ['artisan.destroy', $artisan->id]]) !!}--}}
                        {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Delete this artisan?\')']) !!}--}}
                        {{--{!! Form::close() !!}</td>--}}
                    <td></td>
                    <td></td>
                    <td></td>
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
                ordering: true
            }).columnFilter({
                aoColumns: [
                    {type: "text"},
                    {type: "text"},
                    {type: "select", values: ['M', 'F']},
                    {type: "text"},
                ]
            });
        });
    </script>
@endsection