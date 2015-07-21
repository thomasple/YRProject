@extends('../templates/main')
@section('title')
    Administration-Salon Index
@stop
@section('body')
    {{--<div class="col-sm-offset-4 col-sm-4">--}}
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="panel-title">List of the salons available from this site</h2>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salons as $salon)
                        <tr>
                            <td class="text-primary">
                                <strong>{!! $salon->name !!}</strong>
                            </td>
                            <td>{!! link_to_route('salon.show',"See details",[$salon->id],['class' => 'btn btn-success btn-block']) !!}</td>
                            <td>{!! link_to_route('salon.edit', 'Modify', [$salon->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['salon.destroy', $salon->id]]) !!}
                                {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Do you really want to delete this salon ?\')']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {!! $links !!}
            </table>
        </div>
    {!! link_to_route('salon.create', 'Create new salon', [], ['class' => 'btn btn-info pull-right']) !!}
    {{--</div>--}}
@stop
@section('script')
@stop