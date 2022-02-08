<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
* Модель, предсталяющая объект категории блога.
*/
class Category extends Model
{
    use HasFactory;

    /**
    * Функция выборки постов, принадлежащих к данной категории.
    */
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
