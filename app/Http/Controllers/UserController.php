<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use \App\User as User;

class UserController extends Controller
{
    public function createUser()
    { 	
        return view('createuser');
    }
	
	public function insertUser(Request $request)
	{
		$input = Input::all();
		
		 $this->validate($request, [
			'username' => 'required|min:5',
			'pass' => 'required|min:5',
		]);

		$user = new User();
		
		$user->username = $input['username'];
		$user->password = password_hash($input['pass'], PASSWORD_DEFAULT);
		
		$user->save();
		
		return;
	}
}
