<h2>Edit</h2>
{{ Form::model($board, ['method'=>'PATCH', 'route' => ['boards.update', $board->id]]) }}


@include('admin.boards.edit_form')
{{ Form::close() }}