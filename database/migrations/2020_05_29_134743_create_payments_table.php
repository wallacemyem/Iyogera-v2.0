<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('amount', 50)->nullable();
			$table->string('school_id', 50)->nullable();
			$table->string('time_stamp', 50)->nullable();
			$table->string('amount_paid', 50)->nullable();
			$table->string('tranx_id', 50)->nullable();
			$table->string('ip_address', 50)->nullable();
			$table->string('currency', 50)->nullable();
			$table->string('tx_id', 50)->nullable();
			$table->string('last_digits', 50)->nullable();
			$table->string('card_type', 50)->nullable();
			$table->string('status', 50)->nullable()->default('Pending');
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
		Schema::drop('payments');
	}

}
