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
        $corals = [
            [2,'Actinodiscus Mushroom','http://animal-world.com/encyclo/reef/corallimorph/images/RedMushroom_ACardinalisWRCo_C76.jpg','I love my Actinodiscus Mushroom'],
            [2,'Tabling Acropora Coral','https://reefcorner.com/wp-content/uploads/Acropora-sp-Yellow-and-Purple-Tabling-Colony-1-Top.jpg','I love my Tabling Acropora Coral'],
            [2,'Radioactive Dragon Eyes Zoanthid','http://imgs.markstraley.com/4/radioactive_dragon_eyes_zoanthids_02062010.jpg','Radioactive Dragon Eyes Zoanthid'],
            [2,'Trumpet Coral','http://www.ultimatereef.net/uploader/2008Q4/greentrumpet18nov.jpg','I love my Trumpet Coral'],
            [2,'Frogspawn Coral','http://www.aquaticlog.com/showcase/image.jpeg?imageId=8089','I have 3 Frogspawn Coral colonies in the tank']
        ];

        foreach($corals as $coral) {
            Coral::insert([
                'aquarium_id' => $coral[0],
                'name' => $coral[1],
                'image' => $coral[2],
                'notes' => $coral[3],
                'created_at' => Carbon\Carbon::yesterday()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            ]);
        }
    }
}