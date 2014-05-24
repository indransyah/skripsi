<?php

class KeywordController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $layout = 'backend.layouts.index';

	public function index()
	{
		//
		$keywords = Keyword::all();
		$this->layout->content = View::make('backend.keyword.index')->with('keywords', $keywords);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$this->layout->content = View::make('backend.keyword.create');
		//return 'create';
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		// $csv = Input::file('csv');
		if (Input::hasFile('csv')) {
			$file = Input::file('csv');
			$destinationPath = public_path().'/uploads';
			$filename = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();
			if ($extension=='csv') {
				$upload = $file->move($destinationPath, $filename);
				// $upload = $file->move($path, $filename);
				if ($upload) {
					return Redirect::to('keyword')
					->with('success', 'Keywords successfully imported!');
				} else {
					return Redirect::to('keyword/create')
					->with('error', 'Ups! Upload failed!');
				}
			} else {
				return Redirect::to('keyword/create')
				->with('error', 'Import a csv file from <a href="http://adwords.google.com" class="alert-link">Google AdWords Keyword Planner!</a>!');
			}
		} else {
			return Redirect::to('keyword/create')
					->with('error', 'Ups! Upload failed. Please select a csv file!');
		}
		
		// return Input::file('csv')->getMimeType();
		// $validator = Validator::make(Input::all(), Keyword::$rules);
		// if ($validator->passes()) {
		// 	// $criteria = new Criteria;
		// 	// $criteria->criteria = Input::get('criteria');
		// 	// $criteria->description = Input::get('description');
		// 	// $criteria->save();
		// 	return Redirect::to('keyword')
		// 	->with('success', 'Keywords successfully imported!');
		// } else {
		// 	return Redirect::to('keyword/create')
		// 	->with('error', 'The following errors occurred')
		// 	->withErrors($validator)
		// 	->withInput();
		// }
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
		$keyword = Keyword::find($id);
		$keyword->delete();
		return Redirect::to('keyword')
			->with('success', 'Keyword successfully deleted!');
	}


}
