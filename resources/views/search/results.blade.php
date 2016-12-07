@extends('base')

@section('content')
<h1>
    Search results for {{$term}}
</h1>   
@include('search.form')
<div>
    @foreach($results as $result)
    <div>
        {{$result->getType()}}<br />
        {{$result->getTitle()}}<br />
        {{$result->getText()}}<br />
    </div>
    <hr />
    @endforeach
</div>
@endsection
