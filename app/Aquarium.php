<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aquarium extends Model
{
    //setting the table name as Laravel was trying to use a different name by default.
    protected $table = "aquariums";
}
