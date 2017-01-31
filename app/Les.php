<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Les extends Model
{
    protected $table = 'les';

    protected $primaryKey = 'les_id';

    public $timestamps = FALSE;

    protected $fillable = [
        'lesdatum',
        'starttijd',
        'eindtijd',
        'instructeur',
        'lestype_lestype_id'
    ];
}
