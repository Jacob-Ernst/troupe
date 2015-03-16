<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnnouncementMediumTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('announcement_medium', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('announcement_id')->unsigned()->index();
			$table->foreign('announcement_id')->references('id')->on('announcements')->onDelete('cascade');
			$table->integer('medium_id')->unsigned()->index();
			$table->foreign('medium_id')->references('id')->on('media')->onDelete('cascade');
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
		Schema::drop('announcement_medium');
	}

}
