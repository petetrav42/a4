<?php

use Illuminate\Database\Seeder;
use App\Fish;

class FishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fish::insert([
            'tank_id' => 1,
            'name' => 'Cobalt Blue Zebra Cichlid',
            'type' => 'Freshwater',
            'care_level' => 'Easy',
            'temperament' => 'Semi-aggressive',
            'reef_compatible' => 'N/A',
            'image' => 'http://www.tropical-fish-keeping.com/wp-content/uploads/2015/04/Cobalt-Blue-Zebra-Cichlid-Metriaclima-callainos-male.jpg',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'notes' => 'Cobalt Blue Zebra Cichlid',
        ]);

        Fish::insert([
            'tank_id' => 1,
            'name' => 'Bala Shark',
            'type' => 'Freshwater',
            'care_level' => 'Moderate',
            'temperament' => 'Semi-aggressive',
            'reef_compatible' => 'N/A',
            'image' => 'http://aquariumtidings.com/wp-content/uploads/2014/08/640px-Bala-shark.jpg',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'notes' => 'I like Bala Sharks',
        ]);

        Fish::insert([
            'tank_id' => 2,
            'name' => 'Ocellaris Clownfish',
            'type' => 'Saltwater',
            'care_level' => 'Easy',
            'temperament' => 'Peaceful',
            'reef_compatible' => 'Yes',
            'image' => 'http://www.educationalresource.info/tropical-marine-fish/clownfish.jpg',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'notes' => 'I found Nemo',
        ]);

        Fish::insert([
            'tank_id' => 2,
            'name' => 'Tomato Clownfish',
            'type' => 'Saltwater',
            'care_level' => 'Easy',
            'temperament' => 'Semi-aggressive',
            'reef_compatible' => 'Yes',
            'image' => 'http://www.educationalresource.info/tropical-marine-fish/tomato-clownfish.jpg',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'notes' => 'Love my Tomato Clownfish',
        ]);

        Fish::insert([
            'tank_id' => 2,
            'name' => 'Yellow Hawaiian Tang',
            'type' => 'Saltwater',
            'care_level' => 'Easy',
            'temperament' => 'Semi-aggressive',
            'reef_compatible' => 'Yes',
            'image' => 'http://www.educationalresource.info/tropical-marine-fish/yellow-tang.jpg',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'notes' => 'My Yellow Hawaiian Tang',
        ]);
    }
}
