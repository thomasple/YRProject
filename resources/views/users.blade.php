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
			{!! Form::label('phone', 'Phone:') !!}
			{!! Form::text('phone') !!}
		</li>
		<li>
			{!! Form::label('password', 'Password:') !!}
			{!! Form::text('password') !!}
		</li>
		<li>
			{!! Form::label('id_facebook', 'Id_facebook:') !!}
			{!! Form::text('id_facebook') !!}
		</li>
		<li>
			{!! Form::label('admin', 'Admin:') !!}
			{!! Form::text('admin') !!}
		</li>
		<li>
			{!! Form::label('salon_owner', 'Salon_owner:') !!}
			{!! Form::text('salon_owner') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}