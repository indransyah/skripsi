<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('backend.user.login');
});
Route::controller('home', 'HomeController');
Route::controller('user', 'UserController');
Route::resource('criteria', 'CriteriaController');
// Route::resource('keyword', 'KeywordController', 
// 	array('except'=>array('show', 'edit', 'update')));
// Route::resource('criteria', 'CriteriaController');
