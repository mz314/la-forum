@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<br />
<br />
{{ Form::open(['action' => 'BoardController@store']) }}
{{ Form::text('title') }}
<br />
{{ Form::textarea('text') }}
<input type="hidden" name="board_id" value="{{$board->id}}" />
<br />
<button type="submit">
    New topic
</button>
{{ Form::close() }}