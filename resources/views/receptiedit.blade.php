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

{!! Form::open(['action' => 'RecipeController@recipeSave']) !!}
	{!! Form::hidden('id', $recipe->id); !!}
	<div>
		{!! Form::label('name', 'Naziv:'); !!}
		{!! Form::text('name', $recipe->name); !!}
	</div>
	<div>
		{!! Form::label('desc', 'Opis:'); !!}
		{!! Form::textarea('desc', $recipe->description); !!}
	</div>
	<div>
		{!! Form::label('ingr', 'Sastojci:'); !!}
		{!! Form::textarea('ingr', $recipe->ingredients); !!}
	</div>

	<div>{!! Form::submit('Spremi'); !!}</div>
{!! Form::close() !!}
<body>
</html>