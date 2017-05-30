<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\Recipe;

class RecipeController extends Controller
{
    public function recipeList()
	{
		$user = Auth::user();
		$recipes = Recipe::with('user')->get();
		//dd($recipes);
		return view('recepti', ['recipes' => $recipes]);
	}
	
	public function recipeEdit($id)
	{
		$recipe = Recipe::where('id', $id)->first();		
		return view('receptiedit', ['recipe' => $recipe]);
	}
	
	public function recipeDelete($id)
	{
		dd($id);
	}
	
	public function recipeSave(Request $request)
	{
		$recipe = null;
		
		if(isset($request->id))
		{
			$recipe = Recipe::where('id', $request->id)->first();
		}
		else
		{
			$recipe = new Recipe();
		}
		
		$recipe->name = $request->name;
		$recipe->description = $request->desc;
		$recipe->ingredients = $request->ingr;
		
		$recipe->save();
		
		
		return redirect()->action('RecipeController@recipeList');
	}
}
