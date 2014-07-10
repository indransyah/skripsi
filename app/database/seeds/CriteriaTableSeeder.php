<?php

class CriteriaTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('criterias')->delete();
		Criteria::create(array(
			'criteria' => 'Word',
			'description' => 'number of keyword\'s words',
			'tpv' => 0,
		));

		Criteria::create(array(
			'criteria' => 'Search',
			'description' => 'average monthly keyword search',
			'tpv' => 0,
		));

		Criteria::create(array(
			'criteria' => 'Competition',
			'description' => 'competition of advertiser',
			'tpv' => 0,
		));

		Criteria::create(array(
			'criteria' => 'BID',
			'description' => 'suggested BID',
			'tpv' => 0,
		));
	}
}


