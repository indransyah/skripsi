<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcriteriaJudgmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subcriteria_judgments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('subcriteria_id');
			$table->integer('judgment');
			$table->unsignedInteger('compared_subcriteria_id');
			$table->foreign('subcriteria_id')->references('subcriteria_id')->on('subcriterias')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('compared_subcriteria_id')->references('subcriteria_id')->on('subcriterias')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subcriteria_judgments');
	}

}
