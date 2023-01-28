<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
//        static::deleting(function ($category) {
//            $category->posts()->delete();
//        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class,'category_id');
    }
}
