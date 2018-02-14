<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Chamadas.
 *
 * @author  The scaffold-interface created at 2018-02-08 11:37:27pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Chamadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('chamadas',function (Blueprint $table){

        $table->increments('id');
        
        $table->boolean('falta');
        
        /**
         * Foreignkeys section
         */
        
        $table->integer('aluno_id')->unsigned()->nullable();
        $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
        
        $table->integer('aula_id')->unsigned()->nullable();
        $table->foreign('aula_id')->references('id')->on('aulas')->onDelete('cascade');
        
        
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('chamadas');
    }
}
