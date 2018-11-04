<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'post_id', 'user_id'];

    function post()
    {
        return $this->belongsTo(Post::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
