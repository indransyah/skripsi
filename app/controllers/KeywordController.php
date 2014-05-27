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
				if ($upload) {
					$from = fopen(public_path().'/uploads/'.$filename, 'r+');
					$arr = array();
					$pass = true;
					$header = array('group', 'keyword', 'currency', 'search', 'competition', 'bid', 'impression', 'account', 'plan');
					while (($data = fgetcsv($from, 1000, "\t", '"')) !== false) {
						if ($pass==false) {
							unset($data[9]);
							if (count($header) == count($data)) {
								$arr[] = array_combine($header, $data);
							}
						} else {
							$pass = false;
						}
					}
					fclose($from);
					return count($arr);
					/*
					$from = fopen(public_path().'/uploads/'.$filename, 'r+');
					$arr = array();
					$header = true;
		            $fields = array('group', 'keyword', 'currency', 'search', 'competition', 'bid', 'impression', 'account', 'plan');
					while (($data = fgetcsv($from, 1000, "\t", '"')) !== false) {
						if ($header==false) {
							$data = array_filter($data);
							unset($data[9]);
							$arr[] = array_combine($fields, $data);
							print_r($arr);

						} else {
							$header = false;
						}
						// $arr[] = $headerRowExists ? array_combine($header, $data) : $data;
					}
					*/
					// $cars=array("Volvo","BMW","Toyota");
					// print_r($cars);
					// echo $cars[1];
					//Excel::load(public_path().'/uploads/'.$filename, function($reader) {})->get();
					// CSV::setDelimiter("\t");
					// CSV::setHeaderRowExists(true);
					// $arrayCSV = CSV::fromFile(public_path().'/uploads/'.$filename)->toArray();
					//print_r($arrayCSV);
					// foreach ($csv as $key => $value) {
					// 	return $value->keyword;
					// }
					// return Redirect::to('keyword')
					// ->with('success', 'Keywords successfully imported!');
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
