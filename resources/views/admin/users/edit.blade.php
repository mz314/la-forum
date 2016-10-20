<h2>Edit</h2>
{{$user->roles()->first()}}

{{ Form::model($user, ['method'=>'PATCH', 'route' => ['users.update', $user->id]]) }}
@include('admin.users.edit_form')
<button type="submit">
    Save
</button>
{{ Form::close() }}