<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            [
                'name' => 'Бял',
                'attribute_id' => 1
            ],
            [
                'name' => 'Черен',
                'attribute_id' => 1
            ],
            [
                'name' => 'Сив',
                'attribute_id' => 1
            ],
            [
                'name' => 'Кафяв',
                'attribute_id' => 7
            ],
            [
                'name' => 'Бежов',
                'attribute_id' => 7
            ]
        ];
        foreach ($options as $key => $option) {
            DB::table('attributes_options')->insert([
                $option
            ]);
        }
    }
}
