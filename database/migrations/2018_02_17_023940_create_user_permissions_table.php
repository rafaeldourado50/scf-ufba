<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_permissions', function(Blueprint $table)
		{
			$table->integer('permission_id')->unsigned();
			$table->integer('model_id')->unsigned();
			$table->string('model_type');
			$table->primary(['permission_id','model_id','model_type']);
			$table->index(['model_id','model_type']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_permissions');
	}

}