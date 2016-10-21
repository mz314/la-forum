@if($type=='topic')
{{$reply_action = '#' }}
{{ $delete_action = 'TopicController@deleteTopic' }}
@else
{{$reply_action = $post->id }}
{{ $delete_action = 'TopicController@deletePost' }}
@endif

<a href="{{$reply_action}}" class="post-reply">
    Reply
</a>



@if(Auth::user())
@if(Entrust::hasRole('admin'))
{{ Form::open(['action' =>[$delete_action, $post->id], 'method'=>'DELETE']) }}
{{ Form::submit('Drop') }}
{{ Form::close() }}
@endif

@if(Auth::user()->id == $post->user_id || Entrust::hasRole('admin'))
<a>
    Soft delete
</a>
@endif
@endif
