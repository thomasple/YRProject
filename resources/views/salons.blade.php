{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('description', 'Description:') !!}
			{!! Form::textarea('description') !!}
		</li>
		<li>
			{!! Form::label('address', 'Address:') !!}
			{!! Form::textarea('address') !!}
		</li>
		<li>
			{!! Form::label('main_photo', 'Main_photo:') !!}
			{!! Form::text('main_photo') !!}
		</li>
		<li>
			{!! Form::label('owner_id', 'Owner_id:') !!}
			{!! Form::text('owner_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}