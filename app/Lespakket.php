<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lespakket extends Model
{
    protected $table = 'lespakket';
    protected $primaryKey = 'lespakket_id';

    public $timestamps = FALSE;

    protected $fillable = [
        'lespakket',
        'lessenaantal',
        'actie',
        'voertuigtype_voertuigtype_id'
    ];
    public function toVoertuigType()
    {
        return $this->belongsTo('App\Voertuigtype', 'voertuigtype_voertuigtype_id', 'voertuigtype_id');
    }

    public function toLesPrijs()
    {
        return $this->belongsTo('App\Lesprijs', 'lespakket_id', 'lespakket_lespakket_id');
    }
}
