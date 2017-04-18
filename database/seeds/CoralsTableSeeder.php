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
            'tank_id' => 1,
            'name' => 'Zoaths',
            'type' => 'SPS',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'notes' => 'My first coral',
        ]);
    }
}