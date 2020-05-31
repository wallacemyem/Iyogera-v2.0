<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnrollsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enrolls', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('student_id')->nullable();
			$table->integer('class_id')->nullable();
			$table->integer('section_id')->nullable();
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
		Schema::drop('enrolls');
	}

}
