<?php

class Keyword extends Eloquent {

	protected $table = 'keywords';

	protected $primaryKey = 'keyword_id';

	public $timestamps = false;
	
	public static $rules = array(
		'keyword'=>'required',
		'search'=>'required|numeric',
		'competition'=>'required|numeric',
		'bid'=>'required|numeric'
	);
	
}