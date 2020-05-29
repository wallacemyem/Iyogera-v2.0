<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schools', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name')->nullable();
			$table->string('session')->nullable();
			$table->text('address')->nullable();
			$table->text('phone')->nullable();
			$table->text('short')->nullable();
			$table->string('country', 50)->nullable()->default('NG');
			$table->string('currency', 50)->nullable()->default('NGN');
			$table->text('license')->nullable();
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
		Schema::drop('schools');
	}

}
