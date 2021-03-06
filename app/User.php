<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'voornaam',
        'tussenvoegsel',
        'achternaam',
        'geboren',
        'geslacht',
        'adres',
        'huisnr',
        'plaats',
        'postcode',
        'plaats',
        'telefoon',
        'email',
        'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function toLicentie()
    {
        return $this->belongsToMany('App\Voertuigtype', 'licentie', 'users_id', 'voertuigtype_voertuigtype_id')
            ->withPivot('startdatum','einddatum');
    }

    public function toLespakket()
    {
        return $this->belongsToMany('App\Lespakket', 'contract', 'users_id', 'lespakket_lespakket_id')
            ->withPivot('contract_id','instructeur_id','lespakket_lespakket_id');
    }

    public function toBetaling()
    {
        return $this->hasMany('App\Betaling','users_id');
    }

    public function toRol()
    {
        return $this->belongsToMany('App\Rol', 'roltoekenning', 'users_id', 'rol_rol_id');
    }

    public function toVoertuiggebruiker()
    {
        return $this->belongsToMany('App\Voertuig', 'voertuiggebruiker', 'users_id', 'voertuig_kenteken')
            ->withPivot('startdatum','einddatum');
    }

    public function toAbsentie()
    {
        return $this->belongsToMany('App\Absentietype', 'absentie', 'users_id', 'absentietype_absentietype_id')
            ->withPivot('startdatum','einddatum','notitie');
    }
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->toRol()->where("rol_id", $role)->first()) {
            return true;
        }
        return false;
    }

}
