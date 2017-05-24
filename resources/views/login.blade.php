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

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

{!! Form::open(['action' => 'UserController@checkUser']) !!}
	<div>
		{!! Form::label('username', 'Korisnik:'); !!}
		{!! Form::text('username', ''); !!}
	</div>
	<div>
		{!! Form::label('pass', 'Lozinka:'); !!}
		{!! Form::password('pass', ''); !!}
	</div>

	<div>{!! Form::submit('Login'); !!}</div>
{!! Form::close() !!}
<body>
</html>