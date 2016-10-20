<div class="post" style="border: 1px solid black">
    <div class="text">
        {!! nl2br(e($post->text)) !!}
    </div>
    <div class="author">
        {{$post->user->name}}
    </div>
    <div>

        @if($type=='topic')
        <a href="#" class="post-reply">
            Reply
        </a>
        @else

        <a href="{{$post->id}}" class="post-reply">
            Reply
        </a>
        @endif

        @if(Auth::user())
            @if(Entrust::hasRole('admin'))
            <a href="#">
                Drop
            </a>
            @endif

            @if(Auth::user()->id == $post->user_id || Entrust::hasRole('admin'))
            <a>
                Soft delete
            </a>
            @endif
        @endif
    </div>
</div>