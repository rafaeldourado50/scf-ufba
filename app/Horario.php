<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'dia', 'hora_inicio', 'minuto_inicio', 'turma_id', 'hora_fim', 'minuto_fim', 'nro_primeira_turma', 'qtd_turmas',
    ];

    public function turma()
    {
        return $this->belongsTo('App\Turma');
    }
}
