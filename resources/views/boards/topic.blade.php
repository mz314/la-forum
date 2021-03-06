@extends('base')

@section('title')
LaForum - {{$topic->board->title}} - {{$topic->title}}
@endsection

@section('content')
<h1>
    {{$topic->title}}
</h1>
<div>
    @include('boards.includes.topic_post', ['post' => $topic->post, 'type'=>'topic'])

</div>

<div class="separator">
    <hr />
</div>
<div class="replies">
   @include('boards.includes.recursive_posts', ['root_id'=>$topic->post->id, 'replies'=>$replies ])
</div>

@include('boards.includes.reply_form')

@endsection

