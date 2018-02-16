<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    public $timestamps = false;

	protected $fillable = [
        'user_id', 'semestre', 'turma_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function turma()
    {
        return $this->belongsTo('App\Turma');
    }

    public function alunos()
    {
        return $this->hasMany('App\Aluno');
    }

    public function aulas()
    {
        return $this->hasMany('App\Aula');
    }
}
