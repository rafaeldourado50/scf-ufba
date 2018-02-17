<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHorariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('horarios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('dia')->nullable();
			$table->integer('hora_inicio')->nullable();
			$table->integer('minuto_inicio')->nullable();
			$table->integer('turma_id')->unsigned()->nullable()->index('horarios_turma_id_foreign');
			$table->integer('hora_fim')->nullable();
			$table->integer('minuto_fim')->nullable();
			$table->integer('nro_primeira_turma')->nullable();
			$table->integer('qtd_turmas')->nullable();
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
		Schema::drop('horarios');
	}

}
