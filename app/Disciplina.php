<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'codigo', 'nome', 'curriculo', 'carga_horaria',
    ];

    public function turmas()
    {
        return $this->hasMany('App\Turma');
    }
}
