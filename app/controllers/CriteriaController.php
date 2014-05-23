<?php

class CriteriaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $layout = 'backend.layouts.index';

	public function __construct()
	{
    	$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth');
	}

	public function index()
	{
		//
		$criterias = Criteria::all();
		$this->layout->content = View::make('backend.criteria.index')->with('criterias', $criterias);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$this->layout->content = View::make('backend.criteria.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$validator = Validator::make(Input::all(), Criteria::$rules);
		if ($validator->passes()) {
			$criteria = new Criteria;
			$criteria->criteria = Input::get('criteria');
			$criteria->description = Input::get('description');
			$criteria->save();
			return Redirect::to('criteria')
			->with('success', 'Criteria successfully added!');
		} else {
			return Redirect::to('criteria/create')
			->with('error', 'The following errors occurred')
			->withErrors($validator)
			->withInput();
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$criteria = Criteria::find($id);
		$this->layout->content = View::make('backend.criteria.edit')
			->with('criteria', $criteria);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$validator = Validator::make(Input::all(), Criteria::$rules);
		if ($validator->passes()) {
			$criteria = Criteria::find($id);
			$criteria->criteria = Input::get('criteria');
			$criteria->description = Input::get('description');
			$criteria->save();
			return Redirect::to('criteria')
			->with('success', 'Criteria successfully edited!');
		} else {
			return Redirect::to('criteria/'.$id.'/edit')
			->with('error', 'The following errors occurred')
			->withErrors($validator)
			->withInput();
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$criteria = Criteria::find($id);
		$criteria->delete();
		return Redirect::to('criteria')
			->with('success', 'Criteria successfully deleted!');
	}


}
