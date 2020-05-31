<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeacherPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teacher_permissions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('class_id')->nullable();
			$table->integer('section_id')->nullable();
			$table->integer('teacher_id')->nullable();
			$table->integer('marks')->nullable()->default(0);
			$table->integer('assignment')->nullable()->default(0);
			$table->integer('attendance')->nullable()->default(0);
			$table->integer('class_teacher')->nullable()->default(0);
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
		Schema::drop('teacher_permissions');
	}

}
