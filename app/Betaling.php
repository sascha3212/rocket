<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Betaling extends Model
{
    protected $table = 'betaling';
    protected $primaryKey = 'betaling_id';

    public $timestamps = FALSE;

    protected $fillable = [
        'bankrekening',
        'bedrag',
        'users_id',
        'contract_contract_id'
    ];
}
