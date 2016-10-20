<div>
Username: {{ Form::text('name') }}
</div>
<div>
   Email: {{ Form::text('email') }}
</div>
<div>
Password: {{ Form::password('password') }}
</div>
<div>
Confirm password: {{ Form::password('password2') }}
</div>
<div>
{{Form::select('roles',$roles, null ,array('multiple'=>'multiple','name'=>'roles[]'))}}
</div>

