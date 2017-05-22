<html>
<body>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::open(['action' => 'UserController@insertUser']) !!}
	<div>
		{!! Form::label('username', 'Korisnik:'); !!}
		{!! Form::text('username', ''); !!}
	</div>
	<div>
		{!! Form::label('pass', 'Lozinka:'); !!}
		{!! Form::password('pass', ''); !!}
	</div>

	<div>{!! Form::submit('Spremi'); !!}</div>
{!! Form::close() !!}
<body>
</html>