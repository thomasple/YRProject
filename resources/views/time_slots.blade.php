{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('day', 'Day:') !!}
			{!! Form::text('day') !!}
		</li>
		<li>
			{!! Form::label('from_hour', 'From_hour:') !!}
			{!! Form::text('from_hour') !!}
		</li>
		<li>
			{!! Form::label('to_hour', 'To_hour:') !!}
			{!! Form::text('to_hour') !!}
		</li>
		<li>
			{!! Form::label('service_id', 'Service_id:') !!}
			{!! Form::text('service_id') !!}
		</li>
		<li>
			{!! Form::label('artisan_id', 'Artisan_id:') !!}
			{!! Form::text('artisan_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}