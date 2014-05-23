<?php

class Criteria extends Eloquent {

	protected $table = 'criterias';

	public static $rules = array(
		'criteria'=>'required|unique:criterias,criteria|max:30',
		'description'=>'required|max:200'
		
	);
	
}