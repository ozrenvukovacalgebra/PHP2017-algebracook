<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class RecipeController extends Controller
{
    public function recipeList()
	{
		$user = Auth::user();
		dd($user);
		return view('recepti');
	}
}
