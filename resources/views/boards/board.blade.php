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
                <a href="{{ URL::action('ProfileController@index', $t->user->name) }}">
                    <img class="avatar-image" src="{{$t->user->getAvatar()}}" />
                </a>
            </td>
            <td>
                <a href="{{ URL::action('ProfileController@index', $t->user->name) }}">
                    {{$t->user->name}}
                </a>
            </td>
            <td>
                <a href="{{ URL::route('topic', [$t->id]) }}">
                    {{$t->title}}
                </a>
            </td>
            <td>
                {{ str_limit($t->text, 100) }}
            </td>
            <td>
                {{$t->created_at}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $board_topics->links() }}

@include('boards.includes.topic_form')

@endsection