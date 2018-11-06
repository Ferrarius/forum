<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    public function index(Request $request, $tag = NULL)
    {
        $tags = Tag::all();

        foreach($tags as $k => $t) {
            if($t->name == $tag) {
                $tags[$k]->active = 1;
            }
        }

        if($tag) {
            $tagId = Tag::whereName($tag)->first()->id;
            if($request->search) {
                $posts = Post::where('title', 'like', '%'.$request->search.'%')
                    ->orWhere('content', 'like', '%'.$request->search."%")
                    ->whereHas('tags', function($q) use ($tagId) {
                        $q->whereTagId($tagId);
                    })->get();
            } else {
                $posts = Post::whereHas('tags', function($q) use ($tagId) {
                    $q->whereTagId($tagId);
                })->get();
            }
        } else if($request->search) {
            $posts = Post::where('title', 'like', '%'.$request->search.'%')
                ->orWhere('content', 'like', '%'.$request->search."%")->get();
        } else {
            $posts = Post::all();
        }

        return view('posts.index', compact('posts', 'tags'));
    }

    public function create()
    {
        if(Auth::user()->comments->count() < 5) {
            return redirect()->back()->withErrors('You need to place 5 comments before you can make a post!');
        }

        $tags = Tag::all();

        return view('posts.create', compact('tags'));
    }

    public function store(StorePost $request)
    {
        if(Auth::user()->comments->count() < 5) {
            return redirect()->back()->withErrors('You need to place 5 comments before you can make a post!');
        }

        $post = Post::create($request->all());
        foreach($request->get('tags') as $tag) {
            $post->tags()->attach($tag);
        }

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        foreach($post->comments as $k => $comment) {
            if($comment->user->id == Auth::user()->id) {
                $post->comments[$k]->owner = 1;
            }
        }

        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {

    }
}
