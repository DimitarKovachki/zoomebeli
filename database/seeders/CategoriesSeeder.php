<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
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
                'name' => 'Кучета',
                'parent_id' => 0,
                'slug' => 'dog'
            ],
            [
                'name' => 'Котки',
                'parent_id' => 0,
                'slug' => 'cat'
            ],
            [
                'name' => 'Къщи и Легла',
                'parent_id' => 1,
                'slug' => 'dog-bed',
                'image' => '/img/category/nogi-postel-sobaka.jpg'
            ],
            [
                'name' => 'Поставки за купички',
                'parent_id' => 1,
                'slug' => 'dog-bowl',
                'image' => '/img/category/f49d90e4dce070f3a3132e0c90b98420.jpg'
            ],
            [
                'name' => 'Други',
                'parent_id' => 1,
                'slug' => 'dog-others',
                'image' => '/img/category/Pug-Dog-Wallpapers-036.jpg'
            ],
            [
                'name' => 'Къщи и Легла',
                'parent_id' => 2,
                'slug' => 'cat-bed',
                'image' => '/img/category/b117c5ad0652fe55f3be4df0cbe8cf67.jpg'
            ],
            [
                'name' => 'Поставки за купички',
                'parent_id' => 2,
                'slug' => 'cat-bowl',
                'image' => '/img/category/il_794xN.1882104307_auwm.jpg'
            ],
            [
                'name' => 'Други',
                'parent_id' => 2,
                'slug' => 'cat-others',
                'image' => '/img/category/71kZ8Sm4PBL._SL1500_-e1565300092259-1024x575.jpg'
            ],
        ];
        foreach ($options as $key => $option) {
            DB::table('categories')->insert([
                $option
            ]);
        }
    }
}
