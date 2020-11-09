<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('system_name')->nullable();
			$table->string('system_title')->nullable();
			$table->string('system_email')->nullable();
			$table->integer('selected_branch')->nullable();
			$table->string('running_session')->nullable()->default('');
			$table->string('phone')->nullable();
			$table->string('purchase_code')->nullable();
			$table->text('address')->nullable();
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
		Schema::drop('settings');
	}

}
