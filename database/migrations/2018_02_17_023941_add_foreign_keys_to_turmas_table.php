<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTurmasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('turmas', function(Blueprint $table)
		{
			$table->foreign('disciplina_id')->references('id')->on('disciplinas')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('turmas', function(Blueprint $table)
		{
			$table->dropForeign('turmas_disciplina_id_foreign');
		});
	}

}
