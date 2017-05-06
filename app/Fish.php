<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Attribute;
use Validator;

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

    /**
     * Set a many to many relationship between a fish and its attributes
     *
     */
    public function attributes()
    {
        return $this->belongsToMany('App\Attribute')->withTimestamps();
    }

    /**
     * Get all the attributes that are associated to fish
     *
     * @return array $fishTypes
     */
    public static function getFishAttributes() {
        $types = Attribute::wherein('attribute', ['fish_type','care','temperament','reef_compatible'])->get();

        $fishTypes = [];

        foreach ($types as $type) {
            $fishTypes[$type->id][$type->attribute] = $type->description;

        }
        return $fishTypes;
    }

    /**
     * Get the attributes linked to the given fish
     *
     * @param $request
     * @return array $attributes
     */
    public static function getSelectedFishAttributes($request) {
        //Get the attributes for the selected values in the form to ensure the pivot table is updated correctly
        $results = Attribute::whereIn('attribute', ['fish_type','care','temperament','reef_compatible'])
            ->whereIn('description', [$request->fish_type,$request->care,$request->temperament,$request->reef_compatible])
            ->get();

        $attributes = [];
        foreach($results as $result){
            $attributes[] =$result->id;
        }

        return $attributes;
    }

    /**
     * Validator method to validate fields and set custom messages as needed
     *
     * @param Request $request
     * @return mixed
     */
    public static function validateFish($request)
    {
        //Validation rules for adding a fish
        $rules = array(
            'name' => 'required|max:255',
            'fish_type' => 'required',
            'image' => 'max:255',
            'notes' => 'max:255',
        );

        //Custom error messages
        $messages = [
            'name.required' => 'Fish name is required',
            'name.max' => 'Fish name cant be more than 255 characters',
            'fish_type.required' => 'Fish type is required',
            'image.max' => 'The image URL cant be more than 255 characters',
            'notes.max' => 'The notes cant be more than 255 characters',
        ];

        //Run validation on the request according to the defined rules
        $validator = Validator::make($request->all(), $rules, $messages);

        return $validator;
    }
}
