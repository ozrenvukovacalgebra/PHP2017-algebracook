<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public $timestamps = false;
	
	public function user()
	{
		return $this->hasMany('\App\User', 'id', 'id_user');
	}
}
