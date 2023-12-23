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

    protected $with = ['user:id,name,image', 'comments.user:id,name,image']; //оптимизация обращений к БД в самой модели

    //Поля, которые можно заполнять в контроллере автоматически (request()-all())
    protected $fillable = [
        'user_id',
        'content',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }
}
