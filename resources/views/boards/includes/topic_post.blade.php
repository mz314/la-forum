<div class="post">
    <div class="text"> 
    {!! nl2br(e($post->text)) !!}
    </div>
    <div class="author">
        {{$post->user->name}}
    </div>
    <div>
        <a href="{{$post->id}}" class="post-reply">
            Reply
        </a>
<!--        <a href="{{$post->id}}" class="post-bump">
            Bump
        </a>-->
       
<!--        @if(Auth::user() && Auth::user()->id == $post->user_id)
        <a href="#">
            Edit
        </a>
        
        
        @endif-->
    </div>
</div>