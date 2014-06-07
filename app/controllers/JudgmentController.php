<?php

class JudgmentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
    	$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth');
	}

	protected $layout = 'backend.layouts.index';

	public function getIndex()
	{
		return Redirect::to('judgment/criteria');
	}

	public function getCriteria()
	{
		$criterias = Criteria::all();
		$this->layout->content = View::make('backend.judgment.criteria')->with('criterias', $criterias);
	}

}
