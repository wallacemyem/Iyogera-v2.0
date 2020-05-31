<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReferencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('references', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('school_id', 50)->nullable();
			$table->string('session', 50)->nullable();
			$table->string('tx_ref_id', 50)->nullable();
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
		Schema::drop('references');
	}

}
