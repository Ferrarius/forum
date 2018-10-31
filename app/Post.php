<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    function user()
    {
        return $this->belongsTo(User::class);
    }

    function comments()
    {
        return $this->hasMany(Comment::class);
    }

    function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
