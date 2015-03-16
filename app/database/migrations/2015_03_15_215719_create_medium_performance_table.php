<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediumPerformanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medium_performance', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('medium_id')->unsigned()->index();
			$table->foreign('medium_id')->references('id')->on('media')->onDelete('cascade');
			$table->integer('performance_id')->unsigned()->index();
			$table->foreign('performance_id')->references('id')->on('performances')->onDelete('cascade');
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
		Schema::drop('medium_performance');
	}

}
