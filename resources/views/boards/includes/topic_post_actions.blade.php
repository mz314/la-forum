@if($type=='topic')
@php($reply_action = '#')
@php($delete_action = 'TopicController@deleteTopic')
@else
@php($reply_action = $post->id)
@php($delete_action = 'TopicController@deletePost')
@endif

<a class="btn btn-default" href="{{$reply_action}}" class="post-reply">
    Reply
</a>



<!--@if(Auth::user())
@if(Entrust::hasRole('admin'))
{{ Form::open(['action' =>[$delete_action, $post->id], 'method'=>'DELETE', 'class'=>'form-inline']) }}
{{ Form::submit('Drop', ['class'=>'btn btn-danger']) }}
{{ Form::close() }}
@endif-->

@if(Auth::user()->id == $post->user_id || Entrust::hasRole('admin'))
{{ Form::open(['action' =>[$delete_action, $post->id], 'method'=>'DELETE', 'class'=>'form-inline']) }}
<input type="hidden" name="hard" value="0" />
<button type="submit" class="btn btn-danger soft-delete">
    Delete
</button>
{{ Form::close() }}
@endif
@endif
