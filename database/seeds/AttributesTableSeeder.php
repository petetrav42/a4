<?php

use Illuminate\Database\Seeder;
use App\Attribute;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            ['fish_type','Freshwater'],
            ['fish_type','Saltwater'],
            ['coral_type','Polyps'],
            ['coral_type','Mushroom'],
            ['coral_type','Soft Coral'],
            ['coral_type','SPS Hard Coral'],
            ['coral_type','LPS Hard Coral'],
            ['care','Easy'],
            ['care','Moderate'],
            ['care','Hard'],
            ['temperament','Peaceful'],
            ['temperament','Semi-aggressive'],
            ['temperament','Aggressive'],
            ['reef_compatible','Yes'],
            ['reef_compatible','No'],
            ['lighting','Low'],
            ['lighting','Moderate'],
            ['lighting','High'],
            ['waterflow','Low'],
            ['waterflow','Medium'],
            ['waterflow','High'],
        ];

        foreach($attributes as $attribute) {
            Attribute::insert([
                'attribute' => $attribute[0],
                'description' => $attribute[1],
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            ]);
        }
    }
}
