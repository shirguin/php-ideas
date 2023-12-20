<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;
    //Защищенные поля от автозаполнения
    // protected $quarded = [
    //     'id',
    //     'created_at',
    //     'updated_at',
    // ];

    // protected $quarded = [];


    //Поля, которые можно заполнять в контроллере автоматически (request()-all())
    protected $fillable = [
        'user_id',
        'content',
        'likes',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
