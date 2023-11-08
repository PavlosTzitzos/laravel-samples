<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $table = 'posts';

    protected $fillable = ['title', 'slug', 'content'];

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::saving(function ($model) {
    //         $model->slug = str_slug($model->title);
    //     });
    // }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
