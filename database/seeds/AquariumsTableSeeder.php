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
            'name' => '125 Gallon Aquarium',
            'size' => 125,
            'type' => 'Freshwater',
            'image' => 'http://www.aquatechaquariumservice.com/images/tropicalfish_fishtank.jpg',
            'notes' => 'This was my first freshwater aquarium and it is amazing. I am not having any issues with it.',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        Aquarium::insert([
            'user_id' => 1,
            'name' => '180 Gallon Aquarium',
            'size' => 180,
            'type' => 'Saltwater',
            'image' => 'https://s-media-cache-ak0.pinimg.com/originals/73/0c/47/730c47955e20185563122f613da0de08.jpg',
            'notes' => 'My 180 gallon mixed reef aquarium.  The corals have turned out awesome and loving the fish.',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        Aquarium::insert([
            'user_id' => 1,
            'name' => '55 Gallon Aquarium',
            'size' => 55,
            'type' => 'Freshwater',
            'image' => 'https://i.ytimg.com/vi/34l5YdYiEHo/maxresdefault.jpg',
            'notes' => 'Office aquarium that I am just setting up.',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        Aquarium::insert([
            'user_id' => 1,
            'name' => '210 Gallon Aquarium',
            'size' => 210,
            'type' => 'Saltwater',
            'notes' => 'This my aquarium of all aquariums in the office.  It is managed by a local aquarium store.',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }
}
