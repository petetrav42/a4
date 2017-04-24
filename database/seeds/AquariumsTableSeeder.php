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
            'name' => 'Amazing 125 Gallon Tank',
            'size' => 125,
            'type' => 'Freshwater',
            'image' => 'http://www.aquatechaquariumservice.com/images/tropicalfish_fishtank.jpg',
            'notes' => 'notes field',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        Aquarium::insert([
            'user_id' => 1,
            'name' => '180 Gallon Tank',
            'size' => 180,
            'type' => 'Saltwater',
            'image' => 'https://s-media-cache-ak0.pinimg.com/originals/73/0c/47/730c47955e20185563122f613da0de08.jpg',
            'notes' => 'notes field',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        Aquarium::insert([
            'user_id' => 1,
            'name' => '125 Gallon Tank',
            'size' => 125,
            'type' => 'Freshwater',
            'image' => 'https://i.ytimg.com/vi/34l5YdYiEHo/maxresdefault.jpg',
            'notes' => 'notes field',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        Aquarium::insert([
            'user_id' => 1,
            'name' => '210 Gallon Tank',
            'size' => 210,
            'type' => 'Saltwater',
            'image' => 'https://s-media-cache-ak0.pinimg.com/originals/27/a5/22/27a5224c9446083381d10ba7827f1b15.jpg',
            'notes' => 'notes field',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }
}
