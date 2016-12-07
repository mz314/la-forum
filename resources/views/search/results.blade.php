@extends('base')

@section('content')
<h1>
    Search results for {{$term}}
</h1>   
@include('search.form')
<div>
    @foreach($results as $type=>$result)
    <div>
        {{dump($result)}}
    </div>
    <hr />
    @endforeach
</div>
@endsection
