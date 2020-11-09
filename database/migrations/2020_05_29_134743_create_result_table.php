<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResultTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('result', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('position')->nullable();
			$table->string('subjects', 250)->nullable();
			$table->bigInteger('student_id')->nullable();
			$table->bigInteger('exam_id')->nullable();
			$table->bigInteger('class_id')->nullable();
			$table->bigInteger('section_id')->nullable();
			$table->bigInteger('school_id')->nullable();
			$table->string('session', 50)->nullable();
			$table->string('student_name', 250)->nullable();
			$table->string('student_code', 250)->nullable();
			$table->string('marks_string', 250)->nullable();
			$table->string('total_marks', 250)->nullable();
			$table->string('average', 250)->nullable();
			$table->string('grade', 250)->nullable();
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
		Schema::drop('result');
	}

}
