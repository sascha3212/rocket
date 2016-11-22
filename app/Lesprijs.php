<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesprijs extends Model
{
    protected $table = 'lesprijs';
    protected $primaryKey = 'lespakket_id';

    public $timestamps = FALSE;

    protected $fillable = [
        'prijs',
        'lespakket_lespakket_id'
    ];
}
