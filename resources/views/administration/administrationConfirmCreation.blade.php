@extends('../templates/main')

@section('title')
    Administration-Salon created

@stop
@section('body')
    <div class="panel panel-info">
        <div class="panel-heading">The new salon <?php echo $name ?> was successfully added to the database.</div>

        <div class="panel-body">

            {!! Form::open(array('url' => 'administrator')) !!}

            {!! Form::submit('OK', array('class' => 'btn btn-info pull-right')) !!}

            {!! Form::close() !!}

        </div>
    </div>
@stop
