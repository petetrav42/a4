<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    /**
     * Set a many to many relationship between a fish and its attributes
     *
     */
    public function fishes() {
        return $this->belongsToMany('App\Fish')->withTimestamps();
    }

    /**
     * Set a many to many relationship between a coral and its attributes
     *
     */
    public function corals() {
        return $this->belongsToMany('App\Coral')->withTimestamps();
    }
}
