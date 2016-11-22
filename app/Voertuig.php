<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voertuig extends Model
{
    protected $table = "voertuig";
    protected $primaryKey = 'kenteken';

    public $timestamps = FALSE;
    public $incrementing = FALSE;

    protected $fillable = [
        'kenteken',
        'merk',
        'aankoopdatum',
        'voertuigtype_voertuigtype_id'
    ];

    public function toVoertuigtype()
    {
        return $this->belongsTo('App\Voertuigtype', 'voertuigtype_voertuigtype_id', 'voertuigtype_id');
    }
}
