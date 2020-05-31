<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSyllabusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('syllabuses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title')->nullable();
			$table->integer('class_id')->nullable();
			$table->integer('section_id')->nullable();
			$table->integer('subject_id')->nullable();
			$table->string('file')->nullable();
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
		Schema::drop('syllabuses');
	}

}
