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
            'size' => '125 Gallons',
            'type' => 'Reef Tank',
            'image' => 'images/reeftank.jpg',
            'notes' => 'notes field',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        Aquarium::insert([
            'user_id' => 1,
            'name' => '55 Gallon Tank',
            'size' => '55 Gallons',
            'type' => 'Freshwater Tank',
            'image' => 'images/freshwater.jpg',
            'notes' => 'notes field',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        Aquarium::insert([
            'user_id' => 1,
            'name' => '180 Gallon Tank',
            'size' => '180 Gallons',
            'type' => 'Saltwater Tank',
            'image' => 'images/saltwater.jpg',
            'notes' => 'notes field',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }
}
