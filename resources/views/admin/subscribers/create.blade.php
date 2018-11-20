{{Form::open(['route' => 'admin.subscribers.store', 'method' => 'POST',])}}

{{ Form::label('name', 'name') }}
{{ Form::text('name', null, [ "class" => "form-control", "placeholder" => "name"]) }}

@if ($errors->has('name'))
    {{ $errors->first('name') }}
@endif

{{ Form::label('email', 'email') }}
{{ Form::text('email', null, [ "class" => "form-control", "placeholder" => "email"]) }}

@if ($errors->has('email'))
    {{ $errors->first('email') }}
@endif

{{ Form::submit('Add Subscriber') }}

{{Form::close()}}