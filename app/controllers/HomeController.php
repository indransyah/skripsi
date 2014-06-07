<?php

class HomeController extends BaseController {

	protected $layout = 'backend.layouts.index';

	public function __construct()
	{
    	//$this->beforeFilter('auth');
	}

	public function getIndex()
	{
		$this->layout->content = View::make('backend.dashboard');
	}

}
