<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feestdagen extends Model
{
    protected $table = 'feestdag';
    protected $primaryKey = 'datum';

    public $timestamps = FALSE;
    public $incrementing = FALSE;

    protected $fillable = [
        'datum',
        'einddatum',
        'feestdag',
        'notitie'
    ];
}
