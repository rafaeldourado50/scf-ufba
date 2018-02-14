<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Aulas.
 *
 * @author  The scaffold-interface created at 2018-02-07 06:08:11pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Aulas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('aulas',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('plano_id')->unsigned();

        $table->foreign('plano_id')->references('id')->on('planos')->onDelete('cascade');
        
        $table->String('data');
        
        $table->String('tema');
        
        $table->String('descricao');
        
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
        Schema::drop('aulas');
    }
}
