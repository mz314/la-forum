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


<table>
    <tbody>
        @foreach($board_topics as $t)
        <tr>
            <td>
                <div>
                    <a href="{{ URL::route('topic', [$t->id]) }}">
                        {{$t->title}}
                    </a>
                </div>
                <div>
                    {{ str_limit($t->text, 100) }}
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $board_topics->links() }}

@include('boards.includes.topic_form')


@endsection