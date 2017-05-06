<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

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

    /**
     * Validator method to validate fields and set custom messages as needed
     *
     * @param Request $request
     * @return mixed
     */
    public static function validateAquarium($request)
    {
        //Validation rules for adding an aquarium
        $rules = array(
            'name' => 'required|max:255',
            'tankSize' => 'required|numeric|min:0',
            'type' => 'required',
            'image' => 'max:255',
            'notes' => 'max:255',
        );

        //Custom error messages
        $messages = [
            'name.required' => 'Name is required',
            'name.max' => 'Name cant be more than 255 characters',
            'tankSize.required' => 'Size is required',
            'tankSize.numeric' => 'Size must be numeric',
            'tankSize.min' => 'Size must be a positive number',
            'type.required' => 'Type is required',
            'image.max' => 'The image URL cant be more than 255 characters',
            'notes.max' => 'The notes cant be more than 255 characters',
        ];

        //Run validation on the request according to the defined rules
        $validator = Validator::make($request->all(), $rules, $messages);

        return $validator;
    }
}
