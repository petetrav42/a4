<?php

use Illuminate\Database\Seeder;
use App\Coral;
use App\Attribute;

class AttributeCoralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $corals =[
            'Actinodiscus Mushroom' => [
                'coral_type' => 'Mushroom',
                'care'=> 'Easy',
                'temperament'=> 'Semi-aggressive',
                'lighting'=> 'Moderate',
                'waterflow'=> 'Low'],
            'Tabling Acropora Coral'=> [
                'coral_type' => 'SPS Hard Coral',
                'care'=> 'Hard',
                'temperament'=> 'Peaceful',
                'lighting'=> 'High',
                'waterflow'=> 'High'],
            'Radioactive Dragon Eyes Zoanthid'=> [
                'coral_type' => 'Polyps',
                'care'=> 'Easy',
                'temperament'=> 'Semi-aggressive',
                'lighting'=> 'Moderate',
                'waterflow'=> 'Medium'],
            'Trumpet Coral'=> [
                'coral_type' => 'LPS Hard Coral',
                'care'=> 'Easy',
                'temperament'=> 'Peaceful',
                'lighting'=> 'Moderate',
                'waterflow'=> 'Medium'],
            'Frogspawn Coral'=> [
                'coral_type' => 'LPS Hard Coral',
                'care'=> 'Moderate',
                'temperament'=> 'Aggressive',
                'lighting'=> 'Moderate',
                'waterflow'=> 'Medium']
        ];

        foreach($corals as $coral => $attributes) {
            $newCoral = Coral::where('name','LIKE',$coral)->first();
            foreach($attributes as $attribute => $description) {
                $value = Attribute::where('attribute','=',$attribute)->where('description','=',$description)->first();
                $newCoral->attributes()->save($value);
            }
        }
    }
}
