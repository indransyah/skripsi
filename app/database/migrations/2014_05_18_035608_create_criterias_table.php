<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriteriasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('criterias', function(Blueprint $table)
		{
			$table->increments('criteria_id');
			$table->string('criteria',20);
			$table->longText('description');
			$table->decimal('tpv',5,2);
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
		Schema::drop('criterias');
	}

}
