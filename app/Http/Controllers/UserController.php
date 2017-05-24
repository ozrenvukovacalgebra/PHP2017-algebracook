<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use \App\User as User;
use Auth;

class UserController extends Controller
{
    public function createUser()
    { 	
        return view('createuser');
    }
	
	public function insertUser(Request $request)
	{
		$input = Input::all();
		//$input = $request->all();
		
		$this->validate($request, [
			'username' => 'email|required|min:5',
			'pass' => 'required|min:5',
		]);

		$user = new User();
		
		$user->username = $input['username'];
		$user->password = password_hash($input['pass'], PASSWORD_DEFAULT);
		
		$user->save();
		
		return;
	}
	
	public function loginUser()
	{
		return view('login');
	}
	
	public function checkUser(Request $request)
	{
		$input = $request->all();	
	
		$this->validate($request, [
			'username' => 'email|required|min:5',
			'pass' => 'required|min:5',
		]);
		
		$user = User::where('username', $input['username'])->first();
		
		if(empty($user))
		{
			return redirect()->action('UserController@loginUser')
			->with('status', 'Pogrešan korisnik');
		}
		
		if(password_verify($input['pass'], $user->password))
		{
			Auth::login($user);
			return redirect()->action('RecipeController@recipeList');
		}
		else
		{
			return redirect()->action('UserController@loginUser')
			->with('status', 'Pogrešan password');
		}
		
	}
}
