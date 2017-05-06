<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AquariumsTableSeeder::class);
        $this->call(FishesTableSeeder::class);
        $this->call(CoralsTableSeeder::class);
        $this->call(AttributesTableSeeder::class);
        $this->call(AttributeFishTableSeeder::class);
        $this->call(AttributeCoralTableSeeder::class);
    }
}
