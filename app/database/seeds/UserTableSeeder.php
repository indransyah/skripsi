<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'name'     => 'Indra Firmansyah',
			'username' => 'indransyah',
			'email'    => 'indransyah@gmail.com',
			'password' => Hash::make('insyde'),
		));
	}

}
