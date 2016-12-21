<div class="post">
     <div class="author">
        <img src="{{$post->user->getAvatar()}}" />
        {{$post->user->name}}
    </div>
    
    <div class="text">
        {!! nl2br(e($post->text)) !!}
    </div>
   
    <div class="actions">
        @include('boards.includes.topic_post_actions')
    </div>
</div>