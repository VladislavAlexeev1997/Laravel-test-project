<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++){
            DB::table('comments')->insert([
                'post_id' => rand(1, 20),
                'user_name' => 'Имя Фамилия пользователя '.$i,
                'comment' => 'Комментарий пользователя '.$i,
                'created_at' => date("Y-m-d H:i:s", mt_rand(time() - 604800, time())),
            ]);
        }
    }
}