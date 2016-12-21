@extends('base')

@section('title')
LaForum - {{$board->title}}
@endsection

@section('content')
<h1>
    {{$board->title}}
</h1>
<div>
    {{$board->description}}
</div>


<table class="board-topics table table-bordered">
    <tbody>
        @foreach($board_topics as $t)
        <tr>
            <td>
                <img class="avatar-image" src="{{$t->user->getAvatar()}}" />
            </td>
            <td>
                <a href="{{ URL::route('topic', [$t->id]) }}">
                    {{$t->title}}
                </a>
            </td>
            <td>
                {{ str_limit($t->text, 100) }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $board_topics->links() }}

@include('boards.includes.topic_form')

@endsection