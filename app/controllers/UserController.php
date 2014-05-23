<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
    	$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth', array('only'=>array('getIndex','getProfile')));
	}

	protected $layout = 'backend.layouts.index';

	public function getIndex()
	{
		return Redirect::to('user/profile');
	}

	public function getLogin()
	{
		if (Auth::check()) {
			return Redirect::to('home');
		} else {
			return View::make('backend.user.login');
		}
		
	}

	public function postLogin()
	{
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
		return Redirect::to('home')->with('message', 'You are now logged in!');
		} else {
		return Redirect::to('user/login')
		->with('message', 'Your username/password combination was incorrect')
		->withInput();
		}
	}

	public function getProfile()
	{
		$this->layout->content = View::make('backend.user.profile');
	}

	public function getRegister()
	{
		if (Auth::check()) {
			return Redirect::to('home');
		} else {
			return View::make('backend.user.register');
		}
	}

	public function postRegister()
	{
		$validator = Validator::make(Input::all(), User::$rules);
	    if ($validator->passes()) {
	    	$user = new User;
	    	$user->name = Input::get('name');
	    	$user->email = Input::get('email');
	    	$user->username = Input::get('username');
	    	$user->password = Hash::make(Input::get('password'));
	    	$user->save();
	    	return Redirect::to('user/login')->with('message', 'Thanks for registering!');
	    } else {
	        return Redirect::to('user/register')
				->with('message', 'The following errors occurred')
				->withErrors($validator)
				->withInput();
	    }
	}
	
	public function getLogout()
	{
	    Auth::logout();
	    return Redirect::to('user/login')->with('message', 'Your are now logged out!');
	}
}
