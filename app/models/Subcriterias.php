<?php

class Subcriteria extends Eloquent {

	protected $table = 'subcriterias';

	protected $primaryKey = 'subcriteria_id';

	public $timestamps = false;

	public static $rules = array(
		'subcriteria'=>'required|max:30|unique:subcriterias,subcriteria,null,subcriteria_id,criteria_id',
		'description'=>'required|max:200',
		'filter'=>'sometimes',
		'condition'=>'required'
	);
	
}