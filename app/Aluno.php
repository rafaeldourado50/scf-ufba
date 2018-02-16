<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'plano_id', 'matricula', 'nome', 'email', 'faltas',
    ];

    public function plano()
    {
        return $this->belongsTo('App\Plano');
    }

    public function chamadas()
    {
        return $this->hasMany('App\Chamada');
    }
}
