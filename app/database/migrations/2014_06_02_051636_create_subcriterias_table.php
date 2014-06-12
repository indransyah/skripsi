<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcriteriasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subcriterias', function(Blueprint $table)
		{
			$table->increments('subcriteria_id');
			$table->string('subcriteria');
			$table->longText('description');
			$table->string('field');
			$table->string('filter');
			$table->string('conditional');
			$table->unsignedInteger('criteria_id');
			$table->foreign('criteria_id')->references('criteria_id')->on('criterias')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subcriterias');
	}

}
