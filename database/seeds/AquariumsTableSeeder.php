<?php

use Illuminate\Database\Seeder;
use App\Aquarium;

class AquariumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aquarium::insert([
            'user_id' => 1,
            'name' => 'Amazing Tank',
            'size' => 125,
            'type' => 'Freshwater',
            'image' => 'images/freshwater.jpg',
            'notes' => 'notes field',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        Aquarium::insert([
            'user_id' => 1,
            'name' => '180 Gallon Tank',
            'size' => 180,
            'type' => 'Saltwater',
            'image' => 'images/saltwater.jpg',
            'notes' => 'notes field',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        Aquarium::insert([
            'user_id' => 1,
            'name' => 'Amazing Tank',
            'size' => 125,
            'type' => 'Freshwater',
            'image' => 'images/freshwater.jpg',
            'notes' => 'notes field',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        Aquarium::insert([
            'user_id' => 1,
            'name' => '180 Gallon Tank',
            'size' => 55,
            'type' => 'Saltwater',
            'image' => 'images/saltwater.jpg',
            'notes' => 'notes field',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        Aquarium::insert([
            'user_id' => 1,
            'name' => 'Amazing Tank',
            'size' => 210,
            'type' => 'Freshwater',
            'image' => 'images/freshwater.jpg',
            'notes' => 'notes field',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        Aquarium::insert([
            'user_id' => 1,
            'name' => '180 Gallon Tank',
            'size' => 20,
            'type' => 'Saltwater',
            'image' => 'images/saltwater.jpg',
            'notes' => 'notes field',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        Aquarium::insert([
            'user_id' => 1,
            'name' => 'Amazing Tank',
            'size' => 75,
            'type' => 'Freshwater',
            'notes' => 'notes field',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }
}
