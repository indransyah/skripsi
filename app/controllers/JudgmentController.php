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

	protected $options = array(
			'1'=>'1. Sama penting dengan',
			'2'=>'2. Mendekati sedikit lebih penting dari',
			'3'=>'3. Sedikit lebih penting dari',
			'4'=>'4. Mendekati lebih penting dari',
			'5'=>'5. Lebih penting dari',
			'6'=>'6. Mendekati sangat penting dari',
			'7'=>'7. Sangat penting dari',
			'8'=>'8. Mendekati mutlak dari',
			'9'=>'9. Mutlak sangat penting dari'
		);

	public function getIndex()
	{
		return Redirect::to('judgment/criteria');
	}

	public function getCriteria()
	{
		$criterias = Criteria::all();
		$this->layout->content = View::make('backend.judgment.criteriajudgment')->with(array('criterias'=>$criterias, 'options'=>$this->options));
	}

	public function postCriteria()
	{
		// var_dump(Input::all());
		return Redirect::to('judgment/criteria')
			->withInput();
	}

	public function getSubcriteria($id = null)
	{
		if (empty($id)) {
			$criterias = Criteria::all();
			$this->layout->content = View::make('backend.judgment.criteria')->with('criterias', $criterias);
		} else {
			$criteria = Criteria::find($id);
			$subcriterias = Subcriteria::where('criteria_id', '=', $id)->get();
			$this->layout->content = View::make('backend.judgment.subcriteriajudgment')->with(array('criteria'=>$criteria, 'subcriteria'=>$subcriterias));
		}
		
	}

}
