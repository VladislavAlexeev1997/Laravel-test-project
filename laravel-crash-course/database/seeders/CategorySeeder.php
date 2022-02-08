<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
* Класс для заполнения тесовыми данными таблицы категорий постов prefix_db_categories в БД.
*/
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++){
            DB::table('categories')->insert([
                'title' => 'Категория '.$i,
                'slug' => 'category-'.$i,
            ]);
        }
    }
}