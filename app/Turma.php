<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'disciplina_id', 'codigo',
    ];

    public function disciplina()
    {
        return $this->belongsTo('App\Disciplina');
    }

    public function horarios()
    {
        return $this->hasMany('App\Horario');
    }

    public function plano()
    {
        return $this->hasOne('App\Plano');
    }
}
