<?php

class Criteria extends Eloquent {

	protected $table = 'criterias';

	protected $primaryKey = 'criteria_id';

	public $timestamps = false;

	public static $rules = array(
		'criteria'=>'required|unique:criterias,criteria|max:30',
		'description'=>'required|max:200'
	);
	
}