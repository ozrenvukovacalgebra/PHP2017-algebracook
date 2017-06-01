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
		return view('recepti', ['recipes' => $recipes]);
	}
	
	public function recipeEdit($id)
	{
		$recipe = Recipe::where('id', $id)->first();		
		return view('receptiedit', ['recipe' => $recipe]);
	}
	
	public function recipeInsert()
	{
		return view('receptiinsert');
	}
	
	public function recipeDelete($id)
	{
		$recipe = Recipe::where('id', $id)->first();		
		$recipe->delete();
		return redirect()->action('RecipeController@recipeList');
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
			$user = Auth::user();
			$recipe->id_user = $user->id;
			
			if ($request->file('image')->isValid()) 
			{
				$path = $request->file('image')->store('public');
				$recipe->image = $path;
			}
		}
		
		$recipe->name = $request->name;
		$recipe->description = $request->desc;
		$recipe->ingredients = $request->ingr;
		
		
		$recipe->save();
		
		
		return redirect()->action('RecipeController@recipeList');
	}
}
