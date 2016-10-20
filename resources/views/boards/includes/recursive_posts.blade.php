@if (isset($replies[$root_id]))
@foreach($replies[$root_id] as $reply)
     @include('boards.includes.topic_post', ['post'=>$reply, 'type'=>'post'])
     <div style="margin-left: 10px">
     @include('boards.includes.recursive_posts', ['root_id'=>$reply->id, 'replies'=>$replies ])
     </div>
@endforeach
@endif
