<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddRoleIdToPerformanceUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('performance_user', function(Blueprint $table)
		{
			$table->integer('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('performance_user', function(Blueprint $table)
		{
			$table->dropForeign('performance_user_role_id_foreign');
			$table->dropColumn('role_id');
		});
	}

}
