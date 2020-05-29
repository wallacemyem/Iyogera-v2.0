<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventCalendarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_calendars', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('title')->nullable();
			$table->string('starting_date')->nullable();
			$table->string('ending_date')->nullable();
			$table->integer('school_id')->nullable();
			$table->integer('session')->nullable();
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
		Schema::drop('event_calendars');
	}

}
