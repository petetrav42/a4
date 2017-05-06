<?php

use Illuminate\Database\Seeder;
use App\Fish;
use App\Attribute;

class AttributeFishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fishes =[
            'Cobalt Blue Zebra Cichlid' => [
                'fish_type' => 'Freshwater',
                'care'=> 'Easy',
                'temperament'=> 'Semi-aggressive'],
            'Bala Shark'=> [
                'fish_type' => 'Freshwater',
                'care'=> 'Moderate',
                'temperament'=> 'Semi-aggressive'],
            'Ocellaris Clownfish'=> [
                'fish_type' => 'Saltwater',
                'care'=> 'Easy',
                'temperament'=> 'Peaceful',
                'reef_compatible' => 'Yes'],
            'Tomato Clownfish'=> [
                'fish_type' => 'Saltwater',
                'care'=> 'Easy',
                'temperament'=> 'Semi-aggressive',
                'reef_compatible' => 'Yes'],
            'Yellow Hawaiian Tang'=> [
                'fish_type' => 'Saltwater',
                'care'=> 'Easy',
                'temperament'=> 'Semi-aggressive',
                'reef_compatible' => 'Yes']
        ];

        foreach($fishes as $fish => $attributes) {
            $newFish = Fish::where('name','LIKE',$fish)->first();
            foreach($attributes as $attribute => $description) {
                $value = Attribute::where('attribute','=',$attribute)->where('description','=',$description)->first();
                $newFish->attributes()->save($value);
            }
        }
    }
}
