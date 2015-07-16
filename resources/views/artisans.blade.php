{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('specialty', 'Specialty:') !!}
			{!! Form::textarea('specialty') !!}
		</li>
		<li>
			{!! Form::label('description', 'Description:') !!}
			{!! Form::textarea('description') !!}
		</li>
		<li>
			{!! Form::label('sex', 'Sex:') !!}
			{!! Form::text('sex') !!}
		</li>
		<li>
			{!! Form::label('main_photo', 'Main_photo:') !!}
			{!! Form::text('main_photo') !!}
		</li>
		<li>
			{!! Form::label('salon_id', 'Salon_id:') !!}
			{!! Form::text('salon_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}