{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('artisan_id', 'Artisan_id:') !!}
			{!! Form::text('artisan_id') !!}
		</li>
		<li>
			{!! Form::label('service_id', 'Service_id:') !!}
			{!! Form::text('service_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}