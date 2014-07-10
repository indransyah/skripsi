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
		// $keywords = Keyword::all();
		$keywords = Keyword::paginate(5);
		$this->layout->content = View::make('backend.keyword.index')->with('keywords', $keywords);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('backend.keyword.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
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
					$header = array('group', 'keyword', 'currency', 'search', 'competition', 'bid', 'impression', 'account', 'plan', 'extract');
					while (($data = fgetcsv($from, 1000, "\t", '"')) !== false) {
						if ($pass==false) {
							if (count($header) == count($data)) {
								foreach ($data as $key => $value) {
									$data[$key] = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $value);
								}
								$arr[] = array_combine($header, $data);
							}
						} else {
							$fields = array('Ad group', 'Keyword', 'Currency', 'Avg. Monthly Searches (exact match only)', 'Competition', 'Suggested bid', 'Impr. share', 'In account', 'In plan', 'Extracted From');
							foreach ($data as $key => $value) {
								$data[$key] = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $value);
							}
							$check = array_diff($data, $fields);
							if (!empty($check)) {
								fclose($from);
								return Redirect::to('keyword/create')
								->with('error', 'Ups! Not valid CSV file!');
							} else {
								$pass = false;
							}
						}
					}
					fclose($from);
					foreach ($arr as $index => $value) {
						$arr[$index]['search'] = (int) $value['search'];
						$arr[$index]['competition'] = (float) $value['competition'];
						$arr[$index]['bid'] = (float) $value['bid'];
						$arr[$index]['impression'] = (float) $value['impression'];
						foreach ($value as $field => $item) {
							if (empty($item)) {
								$arr[$index][$field] = 0;
							}
						}
					}
					Keyword::where('csv', '=', $filename)->delete();
					$subcriterias = Subcriteria::all();
					foreach ($arr as $key => $value) {
						$validator = Validator::make($value, Keyword::$rules);
						if ($validator->passes()) {
							for ($i=0; $i < count($subcriterias); $i++) {
								
								/*for ($j=0; $j < count($header); $j++) { 
									// var_dump($subcriterias[$i]);
									// return 'ok';
									if ($subcriterias[$i]->field == $header[$j]) {
										$conditional = explode(';', $subcriterias[$i]->conditional);
										if (count($conditional)==2) {
											$subconditional = array(0,0);
											$map = array(
												'=>' => $subconditional[0] > $subconditional[1],
												'<=' => $subconditional[0] <= $subconditional[1],
												'==' => $subconditional[0] == $subconditional[1],
												'!=' => $subconditional[0] != $subconditional[1],
												);
											for ($k=0; $k < 2; $k++) { 
												foreach ($map as $key => $value) {
													$subconditional[$k] = explode($key, $conditional[$k]);
													if (count($subconditional[$k])==2) {
														$parameter = $key;
													}
													var_dump($subconditional);
													//echo $parameter;
												}
											}
										} else {
											foreach ($map as $key => $value) {
												$subconditional[0] = explode($key, $conditional);
												if ($subconditional[0]<1) {
													$parameter = $key;
												}
											}
										}

									}
								} */
							}

							$keyword = new Keyword;
							$keyword->group = $value['group'];
							$keyword->keyword = $value['keyword'];
							$keyword->currency = $value['currency'];
							$keyword->search = $value['search'];
							$keyword->competition = $value['competition'];
							$keyword->bid = $value['bid'];
							$keyword->impression = $value['impression'];
							$keyword->account = $value['account'];
							$keyword->plan = $value['plan'];
							$keyword->extract = $value['extract'];
							$keyword->csv = $filename;
							$keyword->save();
						}
					}
					// var_dump($arr);
					return Redirect::to('keyword')
					->with('success', 'Keywords successfully imported!');
				} else {
					return Redirect::to('keyword/create')->with('error', 'Ups! Upload failed!');
				}
			} else {
				return Redirect::to('keyword/create')->with('error', 'Import a csv file from <a href="http://adwords.google.com" class="alert-link">Google AdWords Keyword Planner!</a>!');
			}
		} else {
			return Redirect::to('keyword/create')->with('error', 'Ups! Upload failed. Please select a csv file!');
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
		$keyword = Keyword::find($id);
		$keyword->delete();
		return Redirect::to('keyword')->with('success', 'Keyword successfully deleted!');
	}


}
