<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $comment = $request->all();
        $comment['post_id'] = $post->id;
        $comment['user_id'] = Auth::user()->id;
        Comment::create($comment);

        return redirect()->back();
    }

    public function delete(Post $post, Comment $comment)
    {
        $comment->delete();

        return redirect()->back();
    }
}
