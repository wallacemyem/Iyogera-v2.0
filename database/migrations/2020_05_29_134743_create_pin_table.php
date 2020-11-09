<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePinTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pin', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('number', 50)->nullable()->unique('number');
			$table->integer('used')->nullable();
			$table->integer('school_id')->nullable();
			$table->string('session', 50)->nullable();
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
		Schema::drop('pin');
	}

}
