<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', compact('tags'));
    }

    public function store()
    {
        Tag::create();

        return redirect()->back()->with(['status' => 'New tag added!']);
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());

        return redirect()->back()->with(['status' => 'Tag saved!']);
    }

    public function delete(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index');
    }
}
