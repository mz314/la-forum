<div class="post">

    <a href="{{ URL::action('ProfileController@index', $post->user->name) }}" 
       class="author">
        <img src="{{$post->user->getAvatar()}}" class="avatar-image" />
        {{$post->user->name}}
    </a>
    
    <div class="text">
        {!! nl2br(e($post->text)) !!}
    </div>
   
    <div class="actions">
        @include('boards.includes.topic_post_actions')
    </div>
</div>