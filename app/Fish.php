<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    //Set the table name as Laravel was trying to use a different name by default.
    protected $table = "fishes";

    /**
     * Set the relationship to a fish belongs to an aquarium
     *
     */
    public function aquarium() {
        return $this->belongsTo('App\Aquarium');
    }
}
