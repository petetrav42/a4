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
            'name' => 'Clownfish',
            'type' => 'Saltwater',
            'family' => 'Clownfish',
            'reef_safe' => 'Yes',
            'min_tank_size' => 30,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'notes' => 'My first fish',
        ]);
    }
}
