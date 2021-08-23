<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Atributs de la taula que es poden omplir.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_type', 'email', 'password', 'telephone', 'address', 'city', 'nif',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //Relació : Un Usuari pot ser Corredor
    public function runner(){
        return $this->hasOne(Runner::class);
    }
    
    //Relació : Un Usuari pot ser Organitzador
    public function organizer(){
        return $this->hasOne(Organizer::class);
    }

    //Relació : Un Usuari pot estar en moltes Inscripccions
    public function inscriptions(){
        return $this->hasMany(InscriptionsList::class);
    }

    //Una Usuari pot tenir vàries Factures
    public function invoices(){
        return $this->HasMany(Invoice::class);
    }
    
}
