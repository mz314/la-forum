@extends('admin.base')

@section('content')
<a href="{{ URL::route('users.create') }}">
    Add
</a>
<table border="1" width="100%">
    @foreach($users as $user) 
    <tr>
        <td>
            {{$user->id}}
        </td>
        <td>
            {{$user->name}}
        </td>
        <td>
            {{$user->email}}
        </td>
        <td>
             <a href="{{ URL::route('users.edit', $user->id) }}">Edit</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
