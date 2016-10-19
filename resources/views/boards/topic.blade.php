@extends('base')

@section('title')
LaForum - {{$topic->board->title}} - {{$topic->title}}
@endsection

@section('content')
<h1>
    {{$topic->title}}
</h1>
<div>
    @include('boards.includes.topic_post', ['post' => $topic->post])

</div>
<div>Replies:</div>

<div class="replies">
    @each('boards.includes.topic_post', $topic->replies, 'post')
</div>

@include('boards.includes.reply_form')

@endsection

