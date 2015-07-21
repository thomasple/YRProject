@extends('../templates/main')

@section('title')
	Administration
@stop

@section('body')
<p>
You can create a new salon, change a salon's main manager and add or delete other salons' managers.
</p>

{{--first form : creation of a salon--}}
<div class="panel panel-info">

	<div class="panel-heading">Create a new salon</div>

	<div class="panel-body">

		{!! Form::open(array('url' => 'administrator')) !!}

		<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">

			{!! Form::text('salonName', null, array('class' => 'form-control', 'placeholder' => 'Enter the name of the new salon')) !!}

			{!! $errors->first('salonName', '<small class="help-block">:message</small>') !!}

		</div>

		{!! Form::submit('Register !', array('class' => 'btn btn-info pull-right')) !!}

		{!! Form::close() !!}

	</div>

</div>

{{--second form : deletion of a salon--}}
<div class="panel panel-info">

	<div class="panel-heading">Delete an existing salon</div>

	<div class="panel-body">

		{!! Form::open(array('url' => 'administrator')) !!}

		<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
			{!! Form::select('salonDeleteName',$arr) !!}
		</div>

		{!! Form::submit('Register !', array('class' => 'btn btn-info pull-right')) !!}

		{!! Form::close() !!}

	</div>

</div>
@stop

@section('script')

@stop