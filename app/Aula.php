<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'plano_id', 'data', 'tema', 'descricao',
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
