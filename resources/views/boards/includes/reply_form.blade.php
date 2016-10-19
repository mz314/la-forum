<div id="topic-reply-container">
    {{ Form::open(['action' => 'TopicController@reply']) }}
    <input type="hidden" name="parent_id" value="{{$topic->post->id}}" />
    <input type="hidden" name="topic_id" value="{{$topic->id}}" />
    <textarea name="text"></textarea>
    <button type="submit">
        Reply
    </button>
    <button type="button" class="reply-cancel">
        Close
    </button>
    {{ Form::close() }}
</div>