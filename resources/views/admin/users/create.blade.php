<h2>Create</h2>

{{ Form::open(['route' => 'users.store']) }}
@include('admin.users.edit_form')
<button type="submit">
    Save
</button>
{{ Form::close() }}