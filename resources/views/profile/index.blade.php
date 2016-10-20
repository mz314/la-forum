@extends('base')

@section('content')
<div>
Profile of {{$user->name}}
<img src="{{ $user->getAvatar() }}" width="64" />
</div>
<div>
 {{ Form::model($user, ['method'=>'POST', 'route' => ['store_profile'],  'files' => true]) }}
 {{ Form::file('avatar', null) }}
 {{ Form::submit('Update') }}
 {{ Form::close() }}
</div>
@endsection

