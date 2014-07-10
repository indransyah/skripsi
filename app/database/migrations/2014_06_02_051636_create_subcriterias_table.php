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
			$table->string('subcriteria',20);
			$table->longText('description');
			$table->string('field',20);
			$table->string('filter',10);
			$table->string('conditional',50);
			$table->decimal('tpv',5,2);
			$table->decimal('rating',5,2);
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
