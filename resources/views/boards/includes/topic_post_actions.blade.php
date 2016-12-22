
<a class="btn btn-default post-reply" href="{{$post->id}}">
    Reply
</a>



<!--@if(Auth::user())
@if(Entrust::hasRole('admin'))
{{ Form::open(['action' =>['TopicController@deletePost', $post->id], 'method'=>'DELETE', 'class'=>'form-inline']) }}
{{ Form::submit('Drop', ['class'=>'btn btn-danger']) }}
{{ Form::close() }}
@endif-->

@if(Auth::user()->id == $post->user_id || Entrust::hasRole('admin'))
{{ Form::open(['action' =>['TopicController@deletePost', $post->id], 'method'=>'DELETE', 'class'=>'form-inline']) }}
<input type="hidden" name="hard" value="0" />
<button type="submit" class="btn btn-danger soft-delete">
    Delete
</button>
{{ Form::close() }}
@endif
@endif
