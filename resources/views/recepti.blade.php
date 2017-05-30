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
			<td>{{ $recipe->name }}</td>
			<td>{{ Html::linkAction('RecipeController@recipeEdit', 'Edit', ['id' => $recipe->id]) }}</td>
			<td>{{ Html::linkAction('RecipeController@recipeDelete', 'Delete', ['id' => $recipe->id]) }}</td>
		</tr>
	@endforeach
	</table>
</body>
</html>