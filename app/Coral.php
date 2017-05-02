<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coral extends Model
{
    /**
     * Set the relationship to a coral belongs to an aquarium
     *
     */
    public function aquarium() {
        return $this->belongsTo('App\Aquarium');
    }
}
