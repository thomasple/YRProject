@extends('templates/main')

@section('title')
    Salon configuration
@endsection

@section('content')
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-xs-12"
         id="register_body">
        <h1 style="text-align: center">Services provided by artisan
            : {{ $artisan->first_name.' '.$artisan->last_name }}</h1>

        <table class="table table-condensed table-striped" id="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Duration</th>
                <th></th>
                <th></th>

            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Price (RUR)</th>
                <th>Duration</th>
                <th></th>
                <th></th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($services as $service)
                <tr style="background-color:
                @if(! in_array($service->id, $servicesAttachedToArtisan))
                        #d9534f
                @else
                        #5cb85c
                @endif
                        ;">
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->price }}</td>
                    <td>{{ $service->duration}} min</td>
                    <td>@if(! in_array($service->id, $servicesAttachedToArtisan))
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
                    <td>{!! link_to_route('service.show', 'Show', [$service->id], ['class' => 'btn btn-info btn-block']) !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="javascript:history.back()" class="btn btn-primary pull-left">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
        </a>
    </div>

    <div class="charging"></div>
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
                    {type: "text"}
                ]
            });
            $('body').removeClass("loading");
        }).on({
            ajaxStart: function () {
                $('body').addClass("loading");
            }
        });
    </script>
@endsection