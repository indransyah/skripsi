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
		if (Auth::attempt(array('username'=>Input::get('username'), 'password'=>Input::get('password')))) {
		return Redirect::to('home')
			->with('success', 'You are now logged in!');
		} else {
		return Redirect::to('user/login')
			->with('error', 'Your username/password combination was incorrect')
			->withInput();
		}
	}

	public function getProfile()
	{
		$this->layout->content = View::make('backend.user.profile');
	}

	public function postProfile()
	{
		$input = Input::all();
		$rules = User::$rules;
		$rules['email'] .= ','.Auth::user()->user_id.',user_id';
		unset($rules['username']);
		unset($rules['password']);
		unset($rules['password_confirmation']);
		$validator = Validator::make($input, $rules);
	    if ($validator->passes()) {
	    	$user = User::find(Auth::user()->user_id);
	    	$user->name = Input::get('name');
	    	$user->email = Input::get('email');
	    	$user->save();
	    	return Redirect::to('user/profile')
	    		->with('success', 'Profile successfully changed!');
	    } else {
	        return Redirect::to('user/profile')
				->with('error', 'The following errors occurred')
				->withErrors($validator)
				->withInput();
	    }
	}

	public function getPassword()
	{
		$this->layout->content = View::make('backend.user.password');
	}

	public function postPassword()
	{
		$check = Hash::check(Input::get('current_password'), Auth::user()->password);
		if ($check) {
			$input = Input::all();
			$rules = User::$rules;
			unset($rules['name']);
			unset($rules['email']);
			unset($rules['username']);
			$validator = Validator::make($input, $rules);
			if ($validator->passes()) {
				$user = User::find(Auth::user()->user_id);
				$user->password = Hash::make(Input::get('password'));
				$user->save();
				return Redirect::to('user/password')
				->with('success', 'Password successfully changed!');
			} else {
				return Redirect::to('user/password')
				->with('error', 'The following errors occurred')
				->withErrors($validator)
				->withInput();
			}
		} else {
			return Redirect::to('user/password')
				->with('error', 'Wrong current password!');
		}
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
