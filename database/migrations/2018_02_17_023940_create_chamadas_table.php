<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChamadasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chamadas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('falta');
			$table->integer('aluno_id')->unsigned()->index('chamadas_aluno_id_foreign');
			$table->integer('aula_id')->unsigned()->index('chamadas_aula_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chamadas');
	}

}
