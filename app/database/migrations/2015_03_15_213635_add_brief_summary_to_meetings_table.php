<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddBriefSummaryToMeetingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('meetings', function(Blueprint $table)
		{
			$table->string('brief_summary', 255)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('meetings', function(Blueprint $table)
		{
			$table->dropColumn('brief_summary');
		});
	}

}
