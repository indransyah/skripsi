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
			$table->string('group',20);
			$table->string('keyword',100);
			$table->string('currency',10);
			$table->integer('search');
			$table->decimal('competition',5,2);
			$table->decimal('bid',5,2);
			$table->decimal('impression',5,2);
			$table->string('account',1);
			$table->string('plan',1);
			$table->string('extract',1);
			$table->string('csv',50);
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
