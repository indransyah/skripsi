<?php

class SubcriteriaController extends \BaseController {

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
	
	public function getIndex()
	{
		//
		return Redirect::to('criteria');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate($id = null)
	{
		if (empty($id)) {
			return Redirect::to('criteria');
		}
		$criteria = Criteria::where('criteria_id', '=', $id)->count();
		if ($criteria) {
			$this->layout->content = View::make('backend.subcriteria.create')->with('id',$id);
		} else {
			return Redirect::to('criteria');
		}
		// return $criteria;
		// if (empty($id)) {
		// 	return Redirect::to('criteria');
		// } else {
		// 	$this->layout->content = View::make('backend.subcriteria.create')->with('id',$id);
		// }
		// $criterias = Criteria::lists('criteria', 'criteria_id');
		// if ($criterias) {
		// 	$this->layout->content = View::make('backend.subcriteria.create')->with('criterias', $criterias);
		// } else {
		// 	return Redirect::to('criteria');
		// }
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate($id)
	{
		$input = Input::all();
		$rules = Subcriteria::$rules;
		$rules['subcriteria'] .= ',NULL,subcriteria_id,criteria_id,'.$id;
		$validator = Validator::make($input, $rules);
		if ($validator->passes()) {
			$subcriteria = new Subcriteria;
			$subcriteria->subcriteria = Input::get('subcriteria');
			$subcriteria->description = Input::get('description');
			$subcriteria->field = Input::get('field');
			$subcriteria->filter = Input::get('filter');
			$subcriteria->conditional = Input::get('conditional');
			$subcriteria->criteria_id = $id;
			$subcriteria->save();
			return Redirect::to('criteria/'.$id)
				->with('success', 'Subcriteria successfully added!');
		} else {
			return Redirect::to('subcriteria/create/'.$id)
				->with('error', 'The following errors occurred')
				->withErrors($validator)
				->withInput();
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id = null, $criteria_id = null)
	{
		$subcriteria = Subcriteria::find($id);
		if ($subcriteria) {
			$this->layout->content = View::make('backend.subcriteria.edit')
				->with(array(
				'id' => $criteria_id,
				'subcriteria' => $subcriteria
				)
			);
		} else {
			return Redirect::to('criteria');
		}
		// return $criteria_id;
		// $subcriteria = Subcriteria::find($id);
		// if ($subcriteria) {
		// 	$this->layout->content = View::make('backend.subcriteria.edit')
		// 		->with('subcriteria', $subcriteria);
		// } else {
		// 	return Redirect::to('criteria');
		// }
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postUpdate($id,$criteria_id)
	{
		$input = Input::all();
		$rules = Subcriteria::$rules;
		$rules['subcriteria'] .= ','.$id.',subcriteria_id,criteria_id,'.$criteria_id;
		$validator = Validator::make($input, $rules);
		if ($validator->passes()) {
			$subcriteria = Subcriteria::find($id);
			$subcriteria->subcriteria = Input::get('subcriteria');
			$subcriteria->description = Input::get('description');
			$subcriteria->filter = Input::get('filter');
			$subcriteria->conditional = Input::get('conditional');
			$subcriteria->save();
			return Redirect::to('criteria/'.$criteria_id)
				->with('success', 'Subcriteria successfully edited!');
		} else {
			return Redirect::to('subcriteria/edit/'.$id.'/'.$criteria_id)
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
	public function postDestroy($id,$criteria_id)
	{
		$subcriteria = Subcriteria::find($id);
		$subcriteria->delete();
		return Redirect::to('criteria/'.$criteria_id)
			->with('success', 'Subcriteria successfully deleted!');
	}


}
