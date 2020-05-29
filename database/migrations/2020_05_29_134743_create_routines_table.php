<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoutinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('routines', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('class_id')->nullable();
			$table->string('section_id')->nullable();
			$table->string('subject_id')->nullable();
			$table->string('starting_hour')->nullable();
			$table->string('ending_hour')->nullable();
			$table->string('starting_minute')->nullable();
			$table->string('ending_minute')->nullable();
			$table->string('day')->nullable()->default('');
			$table->integer('teacher_id')->nullable();
			$table->integer('room_id')->nullable();
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
		Schema::drop('routines');
	}

}
