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
        $fishes = [
            [1,'Cobalt Blue Zebra Cichlid','http://www.tropical-fish-keeping.com/wp-content/uploads/2015/04/Cobalt-Blue-Zebra-Cichlid-Metriaclima-callainos-male.jpg','Cobalt Blue Zebra Cichlid'],
            [1,'Bala Shark','http://aquariumtidings.com/wp-content/uploads/2014/08/640px-Bala-shark.jpg','I like Bala Sharks'],
            [2,'Ocellaris Clownfish','http://www.educationalresource.info/tropical-marine-fish/clownfish.jpg','I found Nemo'],
            [2,'Tomato Clownfish','http://www.educationalresource.info/tropical-marine-fish/tomato-clownfish.jpg','Love my Tomato Clownfish'],
            [2,'Yellow Hawaiian Tang','http://www.educationalresource.info/tropical-marine-fish/yellow-tang.jpg','My Yellow Hawaiian Tang'],
        ];

        foreach($fishes as $fish) {
            Fish::insert([
                'aquarium_id' => $fish[0],
                'name' => $fish[1],
                'image' => $fish[2],
                'notes' => $fish[3],
                'created_at' => Carbon\Carbon::yesterday()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            ]);
        }
    }
}
