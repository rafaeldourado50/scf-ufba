<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Chamada.
 *
 * @author  The scaffold-interface created at 2018-02-08 11:37:27pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Chamada extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'chamadas';

	
	public function aluno()
	{
		return $this->belongsTo('App\Aluno','aluno_id');
	}

	
	public function aula()
	{
		return $this->belongsTo('App\Aula','aula_id');
	}

	
}
