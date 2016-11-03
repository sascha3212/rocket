<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roltoekenning extends Model
{
    protected $table = 'roltoekenning';

    public function getRollen()
    {
        return $this->belongsTo('App\Rol', 'rol_rol_id', 'rol_id');
    }
}
