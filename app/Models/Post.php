<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'category_id',
        'is_published',
        'read_count',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (is_null($post->created_by)) {
                $post->created_by = auth()->user()->id;
            }
        });

        static::deleting(function ($post) {
            $post->comments()->delete();
            $post->tags()->detach();
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
    }

    public function scopeDrafted($query)
    {
        return $query->where('is_published', 0);
    }

    public function getPublishedAttribute()
    {
        return ($this->is_published) ? 'Yes' : 'No';
    }

    public function getAllPosts($request)
    {
        return self::latest()->when($request->search, function ($query) use ($request) {
            $search = $request->search;
            return $query->where('title', 'like', "%$search%")
                ->orWhere('body', 'like', "%$search%");
        })
            ->with('tags', 'category', 'user')
            ->withCount('comments')
            ->published();
    }

    public function incrementReadCount()
    {
        $this->read_count++;
        return $this->save();
    }

    public function getDashboardPosts()
    {
        if (auth()->user()->hasRole('Admin')) {
            return self::query();
        } else {
            return self::where('created_by', auth()->id());
        }
    }
}
