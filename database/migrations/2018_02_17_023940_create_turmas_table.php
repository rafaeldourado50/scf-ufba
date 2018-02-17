<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTurmasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('turmas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('disciplina_id')->unsigned()->index('turmas_disciplina_id_foreign');
			$table->string('codigo');
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
		Schema::drop('turmas');
	}

}
