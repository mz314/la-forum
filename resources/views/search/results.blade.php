@extends('base')

@section('content')
<h1>
    Search results for {{$term}}
</h1>   
@include('search.form')
@endsection
