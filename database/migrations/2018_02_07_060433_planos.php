<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Planos.
 *
 * @author  The scaffold-interface created at 2018-02-07 06:04:33pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Planos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('planos',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('user_id')->unsigned();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        
        $table->String('curso');
        
        $table->String('semestre');
        
        $table->integer('carga_horaria');
        
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
        Schema::drop('planos');
    }
}
