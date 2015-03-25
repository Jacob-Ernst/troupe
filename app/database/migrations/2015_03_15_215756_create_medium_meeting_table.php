<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediumMeetingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medium_meeting', function(Blueprint $table)
		{
			$table->integer('medium_id')->unsigned()->index();
			$table->foreign('medium_id')->references('id')->on('media')->onDelete('cascade');
			$table->integer('meeting_id')->unsigned()->index();
			$table->foreign('meeting_id')->references('id')->on('meetings')->onDelete('cascade');
			$table->primary(['meeting_id', 'medium_id']);
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
		Schema::drop('medium_meeting');
	}

}
