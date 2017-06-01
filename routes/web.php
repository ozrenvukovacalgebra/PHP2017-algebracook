<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('createuser', 'UserController@createUser');
Route::post('insertuser', 'UserController@insertUser');
Route::get('loginuser', 'UserController@loginUser');
Route::post('checkuser', 'UserController@checkUser');
Route::get('recipes', 'RecipeController@recipeList')->middleware('auth');
Route::get('recipesedit/{id}', 'RecipeController@recipeEdit')->middleware('auth');
Route::get('recipesdelete/{id}', 'RecipeController@recipeDelete')->middleware('auth');
Route::post('recipesave', 'RecipeController@recipeSave')->middleware('auth');
Route::get('recipeinsert', 'RecipeController@recipeInsert')->middleware('auth');
