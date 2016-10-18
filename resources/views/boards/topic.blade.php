@extends('base')
@section('content')
<h1>
    {{$topic->title}}
</h1>
<div>
    {{$topic->post->text}}
</div>
<div>Replies:</div>

<div>
    @foreach($topic->replies as $reply)
        {{$reply->text}}
    @endforeach
</div>

<form method="POST">
    <input type="hidden" name="parent" value="{{$topic->post->id}}" />
    <input type="hidden" name="topic_id" value="{{$topic->id}}" />
    <textarea name="text"></textarea>
    <button type="submit">
        Reply
    </button>
</form>
@endsection