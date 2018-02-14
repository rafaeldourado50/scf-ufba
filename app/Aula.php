<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Aula.
 *
 * @author  The scaffold-interface created at 2018-02-07 06:08:11pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Aula extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'aulas';

	
}
