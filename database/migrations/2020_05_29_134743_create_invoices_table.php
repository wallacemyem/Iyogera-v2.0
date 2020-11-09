<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->nullable();
			$table->integer('total_amount')->nullable();
			$table->integer('class_id')->nullable();
			$table->integer('student_id')->nullable();
			$table->text('payment_method')->nullable();
			$table->integer('paid_amount')->nullable();
			$table->text('status')->nullable();
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
		Schema::drop('invoices');
	}

}
