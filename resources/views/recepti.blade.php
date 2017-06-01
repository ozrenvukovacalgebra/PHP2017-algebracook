<html>
<head></head>
<body>
	<h1>Recepti</h1>
	<table>
	<tr>
		<th>Naziv</th>
	</tr>
	@foreach ($recipes as $recipe)
		<tr>
			<td>{{ Html::image(Storage::url($recipe->image), '', ['width' => 70, 'height' => 70]) }}</td>
			<td>{{ $recipe->name }}</td>
			<td>{{ Html::linkAction('RecipeController@recipeEdit', 'Edit', ['id' => $recipe->id]) }}</td>
			<td>{{ Html::linkAction('RecipeController@recipeDelete', 'Delete', ['id' => $recipe->id]) }}</td>
		</tr>
	@endforeach
	</table>
	<div>
		{{ Html::linkAction('RecipeController@recipeInsert', 'Novi recept') }}
	</div>
</body>
</html>