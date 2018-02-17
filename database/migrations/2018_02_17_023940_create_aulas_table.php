<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAulasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aulas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('plano_id')->unsigned()->index('aulas_plano_id_foreign');
			$table->string('data');
			$table->string('tema')->nullable();
			$table->string('descricao')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('aulas');
	}

}
