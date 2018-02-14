<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Aluno.
 *
 * @author  The scaffold-interface created at 2018-02-07 06:06:13pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Aluno extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'alunos';

	
}
