<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Alunos.
 *
 * @author  The scaffold-interface created at 2018-02-07 06:06:13pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Alunos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('alunos',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('plano_id')->unsigned();

        $table->foreign('plano_id')->references('id')->on('planos')->onDelete('cascade');
        
        $table->String('nome');
        
        $table->String('email');
        
        $table->integer('faltas');
        
        /**
         * Foreignkeys section
         */
        
        
        
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
        Schema::drop('alunos');
    }
}
