<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDailyAttendancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('daily_attendances', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('timestamp')->nullable();
			$table->integer('class_id')->nullable();
			$table->integer('section_id')->nullable();
			$table->integer('student_id')->nullable();
			$table->integer('status')->nullable();
			$table->integer('school_id')->nullable();
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
		Schema::drop('daily_attendances');
	}

}
