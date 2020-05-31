<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenses', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('expense_category_id')->nullable();
			$table->integer('date')->nullable();
			$table->string('amount')->nullable();
			$table->integer('school_id')->nullable();
			$table->string('session')->nullable()->default('');
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
		Schema::drop('expenses');
	}

}
