<?php

class SubcriteriaTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('subcriterias')->delete();
		Subcriteria::create(array(
			'subcriteria' => 'General',
			'description' => 'General keywords',
			'field' => 'keyword',
			'filter' => 'count($x)',
			'conditional' => '',
			'tpv' => '',
			'rating' => '',
			'criteria_id' => 0,
		));
	}
}