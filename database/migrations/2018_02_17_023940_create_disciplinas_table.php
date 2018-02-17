<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDisciplinasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('disciplinas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('codigo')->unique();
			$table->string('nome');
			$table->string('curriculo')->nullable();
			$table->string('carga_horaria')->nullable();
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
		Schema::drop('disciplinas');
	}

}
