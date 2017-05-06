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
        $aquariums = [
            [1,'125 Gallon Aquarium',125,'Freshwater','http://www.aquatechaquariumservice.com/images/tropicalfish_fishtank.jpg', 'This was my first freshwater aquarium and it is amazing. I am not having any issues with it.'],
            [1,'180 Gallon Aquarium',180,'Saltwater','https://s-media-cache-ak0.pinimg.com/originals/73/0c/47/730c47955e20185563122f613da0de08.jpg','My 180 gallon mixed reef aquarium.  The corals have turned out awesome and loving the fish.'],
            [1,'55 Gallon Aquarium',55,'Freshwater','https://i.ytimg.com/vi/34l5YdYiEHo/maxresdefault.jpg','Office aquarium that I am just setting up.'],
            [1,'210 Gallon Aquarium',210,'Saltwater','','This my aquarium of all aquariums in the office. It is managed by a local aquarium store.']
        ];

        foreach($aquariums as $aquarium) {
            Aquarium::insert([
                'user_id' => $aquarium[0],
                'name' => $aquarium[1],
                'size' => $aquarium[2],
                'type' => $aquarium[3],
                'image' => $aquarium[4],
                'notes' => $aquarium[5],
                'created_at' => Carbon\Carbon::yesterday()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            ]);
        }
    }
}
