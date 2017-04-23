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
            'image' => 'images/tank1_c1.jpg',
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
            'image' => 'images/tank1_c1.jpg',
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
            'image' => 'images/tank1_c1.jpg',
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
            'image' => 'images/tank1_c1.jpg',
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
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'notes' => 'My Yellow Hawaiian Tang',
        ]);
    }
}
