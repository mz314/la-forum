@extends('base')

@section('title', 'LaForum')

@section('content')
<table border="1" width="100%">
    <tbody>
        @foreach($boards as $board)
        <tr>
            <td>
                <a href="{{ URL::route('board', [$board->id]) }}">
                    {{$board->title}}
                </a>
            </td>
            <td>
                {{$board->description}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $boards->links() }}

@endsection