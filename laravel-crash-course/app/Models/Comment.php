<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
* Модель, представляющая объект комментария к посту.
*/
class Comment extends Model
{
    use HasFactory;

    /**
    * Параметры столбцов таблицы комментариев prefix_db_comment.
    */
    protected $fillable = ['post_id', 'user_name', 'comment'];

    public $timestamps = false;

    /**
    * Функция выборки поста, к которому принадлежит данный комментарий.
    */
    public function post(){
        return $this->belongsTo(Post::class);
    }

    /**
    * Функция вывода даты создания поста в формате ЧЧ:ММ ДД.ММ.ГГГГ.
    */
    public function getCreateDate(){
        return \Carbon\Carbon::parse($this->created_at)->format('H:i d.m.Y');
    }

    /**
     * Ограничение запроса к таблице комментариев prefix_db_comment
     * для вывода их обратном порядке по дате и времени их опубликования.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDescComments($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}