<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name');
			$table->string('other_name');
			$table->string('middle_name');
			$table->string('email');
			$table->string('password');
			$table->string('profile_pix', 500)->nullable();
			$table->string('role')->nullable();
			$table->text('address')->nullable();
			$table->string('phone')->nullable();
			$table->string('remember_token')->nullable();
			$table->string('birthday')->nullable();
			$table->string('gender')->nullable()->default('other');
			$table->string('blood_group')->nullable();
			$table->integer('school_id')->nullable();
			$table->string('authentication_key')->nullable();
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
		Schema::drop('users');
	}

}
