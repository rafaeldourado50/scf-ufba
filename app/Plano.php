<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Plano.
 *
 * @author  The scaffold-interface created at 2018-02-07 06:04:33pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Plano extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'planos';

	
}
