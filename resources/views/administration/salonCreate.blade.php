@extends('../templates/main')
@section('title')
    Salon creation
@stop
@section('body')
    <div class="col-sm-offset-4 col-sm-4">
        <br>
        <div class="panel panel-primary">
            <div class="panel-heading">Create a new salon</div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['url'=>'salon']) !!}
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                    </div>
                    {!! Form::submit('Confirm', ['class' => 'btn btn-primary pull-right']) !!}
                    {!! Form::close() !!}
                    <a href="javascript:history.back()" class="btn btn-primary">
                        <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
@stop
