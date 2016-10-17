@extends('base')

@section('title', 'LaForum')

@section('content')
<table border="1" width="100%">
    <tbody>
        @foreach($boards as $board)
        <tr>
            <td>
                {{$board->title}}
            </td>
            <td>
                {{$board->description}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection