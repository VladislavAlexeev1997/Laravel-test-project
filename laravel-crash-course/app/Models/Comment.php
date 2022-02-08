<?php

namespace App\Models;

use App\Scopes\ReverseScope;
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
    * Функция представления данных из таблицы комментариев prefix_db_comment
    * во всех запросах с условием упорядочивания данных по дате создания
    * коментария в обратном порядке.
    */
    protected static function booted()
    {
        static::addGlobalScope(new ReverseScope);
    }
}