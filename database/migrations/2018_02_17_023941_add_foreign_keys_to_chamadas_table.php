<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToChamadasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('chamadas', function(Blueprint $table)
		{
			$table->foreign('aluno_id')->references('id')->on('alunos')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('aula_id')->references('id')->on('aulas')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('chamadas', function(Blueprint $table)
		{
			$table->dropForeign('chamadas_aluno_id_foreign');
			$table->dropForeign('chamadas_aula_id_foreign');
		});
	}

}
