<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email', 200)->unique();
		    $table->string('password', 255);
		    $table->string('first_name', 255);
		    $table->string('last_name', 255);
		    $table->string('first_name_meta', 255)->index();
		    $table->string('last_name_meta', 255)->index();
		    $table->enum('type', array('director', 'actor', 'writer', 'artist'));
		    $table->text('bio');
		    $table->string('resume', 255);
		    $table->string('avi', 255);
		    $table->enum('role', array('admin', 'organizer', 'user'));
		    $table->softDeletes();
		    $table->rememberToken();
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
		Schema::drop('users');
	}

}
