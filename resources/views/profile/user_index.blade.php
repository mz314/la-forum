@extends('base')

@section('content')
<div>
    Profile of {{$user->name}}
    {{ Form::model($user, ['method'=>'POST', 'route' => ['store_profile'],  'files' => true]) }}
    <img src="{{ $user->getAvatar() }}" width="64" />

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div>

        {{ Form::file('avatar', null) }}
        {{ Form::textarea('about') }}
        {{ Form::text('name') }}
        {{ Form::email('email') }}
        {{ Form::submit('Update', ['class'=>'btn btn-default']) }}
        {{ Form::close() }}
    </div>
</div>
@endsection

