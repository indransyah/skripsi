<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriteriaJudgmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('criteria_judgments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('criteria_id');
			$table->decimal('judgment',5,2);
			$table->unsignedInteger('compared_criteria_id');
			$table->foreign('criteria_id')->references('criteria_id')->on('criterias')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('compared_criteria_id')->references('criteria_id')->on('criterias')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('criteria_judgments');
	}

}
