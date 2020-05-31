<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpenseCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expense_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable();
			$table->integer('school_id')->nullable();
			$table->string('session')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('expense_categories');
	}

}
