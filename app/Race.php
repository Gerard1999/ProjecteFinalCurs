<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use Sluggable;

    //Una cursa pertany a un usuari
    public function organizer(){
        return $this->belongsTo(Organizer::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array{
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

    //Funció per substreure un fragment de la descripció de la cursa
    public function getGetExcerptAttribute(){
        return substr($this->description, 0, 140);
    }
}


