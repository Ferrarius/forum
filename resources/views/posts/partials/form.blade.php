@csrf

<h6>Tags</h6>
@foreach($tags as $tag)
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="{{$tag->name}}" name="tags[]" value="{{$tag->id}}">
        <label class="form-check-label" for="{{$tag->name}}">{{$tag->name}}</label>
    </div>
@endforeach

<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{old('title', $post->title ?? null)}}">
</div>
<div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" name="content" id="content" cols="30" rows="10">{!! old('content', $post->content ?? null) !!}</textarea>
</div>