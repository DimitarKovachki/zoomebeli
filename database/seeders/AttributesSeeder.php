<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            [
                'id' => 1,
                'name' => 'Цвят',
                'type' => 1 // tva nqam predstawa za kvo sum go slagal
            ],
            [
                'id' => 2,
                'name' => 'Цвят на краката',
                'type' => 1 // tva nqam predstawa za kvo sum go slagal
            ],
            [
                'id' => 3,
                'name' => 'Цвят на краката и решетката',
                'type' => 1 // tva nqam predstawa za kvo sum go slagal
            ],
            [
                'id' => 4,
                'name' => 'Цвят на покрива и страните',
                'type' => 1 // tva nqam predstawa za kvo sum go slagal
            ],
            [
                'id' => 5,
                'name' => 'Основен цвят',
                'type' => 1 // tva nqam predstawa za kvo sum go slagal
            ],
            [
                'id' => 6,
                'name' => 'Цвят за останалите елементи',
                'type' => 1 // tva nqam predstawa za kvo sum go slagal
            ],
            [
                'id' => 7,
                'name' => 'Цвят за възглавница',
                'type' => 1 // tva nqam predstawa za kvo sum go slagal
            ],
        ];
        foreach ($attributes as $key => $attribute) {
            DB::table('attributes')->insert([
                $attribute
            ]);
        }
    }
}
