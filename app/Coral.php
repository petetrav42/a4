<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Attribute;
use Validator;

class Coral extends Model
{
    /**
     * Set the relationship to a coral belongs to an aquarium
     *
     */
    public function aquarium() {
        return $this->belongsTo('App\Aquarium');
    }

    /**
     * Set a many to many relationship between a coral and its attributes
     *
     */
    public function attributes()
    {
        return $this->belongsToMany('App\Attribute')->withTimestamps();
    }

    /**
     * Get all the attributes that are associated to the coral
     *
     * @return array $coraltypes
     */
    public static function getCoralAttributes() {
        $types = Attribute::wherein('attribute', ['coral_type','care','temperament','lighting','waterflow'])->get();

        $coralTypes = [];

        foreach ($types as $type) {
            $coralTypes[$type->id][$type->attribute] = $type->description;

        }
        return $coralTypes;
    }

    /**
     * Get the attributes linked to the given coral
     *
     * @param $request
     * @return array $attributes
     */
    public static function getSelectedCoralAttributes($request) {
        //Get the attributes for the selected values in the form to ensure the pivot table is updated correctly
        $results = Attribute::whereIn('attribute', ['coral_type','care','temperament','lighting','waterflow'])
            ->whereIn('description', [$request->coral_type,$request->care,$request->temperament,$request->lighting,$request->waterflow])
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
    public static function validateCoral($request)
    {
        //Validation rules for adding a coral
        $rules = array(
            'name' => 'required|max:255',
            'coral_type' => 'required',
            'image' => 'max:255',
            'notes' => 'max:255',
        );

        //Custom error messages
        $messages = [
            'name.required' => 'Coral name is required',
            'name.max' => 'Coral name cant be more than 255 characters',
            'coral_type.required' => 'Coral type is required',
            'image.max' => 'The image URL cant be more than 255 characters',
            'notes.max' => 'The notes cant be more than 255 characters',
        ];

        //Run validation on the request according to the defined rules
        $validator = Validator::make($request->all(), $rules, $messages);

        return $validator;
    }
}
