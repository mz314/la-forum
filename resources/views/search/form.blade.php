{{Form::open(['action'=>'SearchController@search', 'method'=>'POST'])}}
{{ Form::text('query', $term) }}
{{ Form::submit('Search') }}
{{Form::close()}}
