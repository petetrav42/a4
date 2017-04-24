<?php

use Illuminate\Database\Seeder;
use App\Coral;

class CoralsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coral::insert([
            'tank_id' => 2,
            'name' => 'Actinodiscus Mushroom',
            'type' => 'Mushroom',
            'care_level' => 'Easy',
            'temperament' => 'Semi-aggressive',
            'lighting' => 'Moderate',
            'waterflow' => 'Low',
            'image' => 'http://animal-world.com/encyclo/reef/corallimorph/images/RedMushroom_ACardinalisWRCo_C76.jpg',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'notes' => 'I love my Actinodiscus Mushroom',
        ]);

        Coral::insert([
            'tank_id' => 2,
            'name' => 'Tabling Acropora Coral',
            'type' => 'SPS',
            'care_level' => 'Difficult',
            'temperament' => 'Peaceful',
            'lighting' => 'High',
            'waterflow' => 'Strong',
            'image' => 'https://reefcorner.com/wp-content/uploads/Acropora-sp-Yellow-and-Purple-Tabling-Colony-1-Top.jpg',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'notes' => 'I love my Tabling Acropora Coral',
        ]);

        Coral::insert([
            'tank_id' => 2,
            'name' => 'Radioactive Dragon Eyes Zoanthid',
            'type' => 'Polyps',
            'care_level' => 'Easy',
            'temperament' => 'Semi-aggressive',
            'lighting' => 'Moderate',
            'waterflow' => 'Medium',
            'image' => 'http://imgs.markstraley.com/4/radioactive_dragon_eyes_zoanthids_02062010.jpg',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'notes' => 'Radioactive Dragon Eyes Zoanthid',
        ]);

        Coral::insert([
            'tank_id' => 2,
            'name' => 'Trumpet Coral',
            'type' => 'LPS',
            'care_level' => 'Easy',
            'temperament' => 'Peaceful',
            'lighting' => 'Moderate',
            'waterflow' => 'Medium',
            'image' => 'http://www.ultimatereef.net/uploader/2008Q4/greentrumpet18nov.jpg',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'notes' => 'I love my Trumpet Coral',
        ]);

        Coral::insert([
            'tank_id' => 2,
            'name' => 'Frogspawn Coral',
            'type' => 'LPS',
            'care_level' => 'Moderate',
            'temperament' => 'Aggressive',
            'lighting' => 'Moderate',
            'waterflow' => 'Medium',
            'image' => 'http://www.aquaticlog.com/showcase/image.jpeg?imageId=8089',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'notes' => 'I have 3 Frogspawn Coral colonies in the tank',
        ]);
    }
}