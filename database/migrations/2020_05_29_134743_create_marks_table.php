<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('marks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('student_id')->nullable();
			$table->integer('subject_id')->nullable();
			$table->integer('class_id')->nullable();
			$table->integer('section_id')->nullable();
			$table->integer('exam_id')->nullable();
			$table->integer('objectives')->nullable();
			$table->integer('practicals')->nullable();
			$table->integer('theory')->nullable();
			$table->integer('ca_total')->nullable();
			$table->integer('mark_total')->nullable();
			$table->text('comment')->nullable();
			$table->integer('session')->nullable();
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
		Schema::drop('marks');
	}

}
