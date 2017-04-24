<?php

use Illuminate\Database\Seeder;
use App\Users;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::insert([
            'name' => 'Travis',
            'email' => 'a@admin.com',
            'password' => bcrypt('password'),
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        Users::insert([
            'name' => 'Jessica',
            'email' => 'b@admin.com',
            'password' => bcrypt('password'),
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }
}
