<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddProductionTypeIdToPerformancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('performances', function(Blueprint $table)
		{
			$table->integer('production_type_id')->unsigned()->index();
            $table->foreign('production_type_id')->references('id')->on('production_types')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('performances', function(Blueprint $table)
		{
			
		});
	}

}
