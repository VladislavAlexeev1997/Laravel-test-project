<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
* Класс для заполнения тесовыми данными таблицы постов блога prefix_db_posts в БД.
*/
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++){
            DB::table('posts')->insert([
                'category_id' => rand(1, 10),
                'title' => 'Пост '.$i,
                'description' => 'Описание поста № '.$i,
                'text' => '<p>Текст поста, текст поста, текст поста... <b>(пост № '.$i.')</b></p>',
                'slug' => 'post-'.$i,
            ]);
        }
    }
}