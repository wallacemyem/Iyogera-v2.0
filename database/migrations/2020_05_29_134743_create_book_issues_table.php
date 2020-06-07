<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookIssuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_issues', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('book_id')->nullable();
			$table->integer('class_id')->nullable();
			$table->integer('student_id')->nullable();
			$table->string('issue_date')->nullable();
			$table->integer('status')->nullable()->default(0);
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
		Schema::dropIfExists('book_issues');
	}

}
