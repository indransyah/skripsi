<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('keywords', function(Blueprint $table)
		{
			$table->increments('keyword_id');
			$table->string('group');
			$table->string('keyword');
			$table->string('currency');
			$table->integer('search');
			$table->decimal('competition',5,2);
			$table->decimal('bid',5,2);
			$table->decimal('impression',5,2);
			$table->string('account');
			$table->string('plan');
			$table->string('extract');
			$table->string('csv');
			// $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('keywords');
	}

}
