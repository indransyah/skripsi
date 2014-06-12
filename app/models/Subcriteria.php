<?php

class Subcriteria extends Eloquent {

	protected $table = 'subcriterias';

	protected $primaryKey = 'subcriteria_id';

	public $timestamps = false;

	public static $rules = array(
		'subcriteria'=>'required|max:30|unique:subcriterias,subcriteria',
		'description'=>'required|max:200',
		'field'=>'required',
		'filter'=>'sometimes',
		'conditional'=>'required'
	);
	
}