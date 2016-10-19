@extends('base')

@section('title')
LaForum - {{$board->title}}
@endsection

@section('content')
<h1>
    {{$board->title}}
</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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
<table>
    <tbody>
        @foreach($board->topics as $t)
        <tr>
            <td>
                <div>
                    <a href="{{ URL::route('topic', [$t->id]) }}">
                        {{$t->title}}
                    </a>
                </div>
                <div>
                    {{str_limit($t->post->text, 10)}}
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection