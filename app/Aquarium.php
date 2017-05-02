<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aquarium extends Model
{
    //Set the table name as Laravel was trying to use a different name by default.
    protected $table = "aquariums";

    /**
     * Set the relationship to an aquarium belongs to a user
     *
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Set the relationship to an aquarium to many corals
     *
     */
    public function fishes() {
        return $this->hasMany('App\Fish');
    }

    /**
     * Set the relationship to an aquarium to many corals
     *
     */
    public function corals() {
        return $this->hasMany('App\Coral');
    }
}
