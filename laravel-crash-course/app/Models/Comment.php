<?php

namespace App\Models;

use App\Scopes\AncientScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function getCreateDate(){
        return \Carbon\Carbon::parse($this->created_at)->format('H:i d.m.Y');
    }

    protected static function booted()
    {
        static::addGlobalScope(new AncientScope);
    }
}