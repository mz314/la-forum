<div class="post" style="border: 1px solid black">
    <div class="text"> 
    {!! nl2br(e($post->text)) !!}
    </div>
    <div class="author">
        {{$post->user->name}}
    </div>
    <div>
        <a href="{{$parent}}" class="post-reply">
            Reply
        </a>

    </div>
</div>