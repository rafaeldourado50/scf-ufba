<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frequencia extends Model
{
    public $timestamps = false;

	protected $fillable = [
        'falta', 'aluno_id', 'aula_id',
    ];

	public function aluno()
	{
		return $this->belongsTo('App\Aluno');
	}

	public function aula()
	{
		return $this->belongsTo('App\Aula');
	}
}
