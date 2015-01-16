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
			$table->text('summary');
		    $table->text('location');
		    $table->string('script', 255)->nullable();
		    $table->date('date');
		    $table->integer('performance_type_id')->unsigned()->index();
			$table->foreign('performance_type_id')->references('id')->on('performance_types')->onDelete('cascade');
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
