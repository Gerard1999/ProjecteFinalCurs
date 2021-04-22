<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Runner extends Model
{
    /**
     * Atributs de la taula que es poden omplir.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'surname',
    ];
}
