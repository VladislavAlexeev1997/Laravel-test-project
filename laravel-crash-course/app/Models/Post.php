<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
* Модель, представляющая объект поста блога.
*/
class Post extends Model
{
    use HasFactory;

    /**
    * Функция выборки категории, к которой принадлежит данный пост.
    */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**
    * Функция выборки комментариев, принадлежащих к данному посту.
    */
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}