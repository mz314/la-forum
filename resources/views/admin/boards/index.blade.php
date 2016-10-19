@extends('admin.base')

@section('content')
<a href="{{ URL::route('boards.create') }}">
    Add
</a>
<table border="1" width="100%">
    <tbody>
        @foreach($boards as $board) 
        <tr>
            <td>{{$board->id}}</td>
            <td>{{$board->title}}</td>
            <td>
                {{ Form::open(['route'=>['boards.destroy', $board->id]]) }}
                {{ method_field('DELETE') }}
                <button type="submit">Delete</button>
                {{ Form::close() }}
                <a href="{{ URL::route('boards.edit', $board->id) }}">Edit</a>
            </td>
            
    
        </tr>
        @endforeach
    </tbody>
</table>
@endsection