<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAulasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('aulas', function(Blueprint $table)
		{
			$table->foreign('plano_id')->references('id')->on('planos')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('aulas', function(Blueprint $table)
		{
			$table->dropForeign('aulas_plano_id_foreign');
		});
	}

}
