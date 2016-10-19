<h2>
    Create
</h2>
{{ Form::open(['route' => 'boards.store']) }}
@include('admin.boards.edit_form')
{{ Form::close() }}