<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePerformancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('performances', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 255);
			$table->text('summary');
		    $table->text('location');
		    $table->string('script', 255)->nullable();
		    $table->date('date');
		    $table->softDeletes();
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
		Schema::drop('performances');
	}

}
