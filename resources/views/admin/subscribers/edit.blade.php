{{Form::open(['route' => ['admin.subscribers.update', $subscriber], 'method' => 'PUT',])}}

{{ Form::label('name', 'name') }}
{{ Form::text('name', $subscriber->name, [ "class" => "form-control", "placeholder" => "name"]) }}

{{ Form::label('email', 'email') }}
{{ Form::text('email', $subscriber->email, [ "class" => "form-control", "placeholder" => "email"]) }}

{{ Form::label('is_subscribed', 'is_subscribed') }}
{{ Form::text('is_subscribed', $subscriber->is_subscribed, [ "class" => "form-control", "placeholder" => "is_subscribed"]) }}

{{ Form::label('expired_on', 'expired_on') }}
{{ Form::text('expired_on', $subscriber->expired_on, [ "class" => "form-control", "placeholder" => "expired_on"]) }}

{{ Form::hidden('id', $subscriber->id) }}

{{ Form::submit('Update Subscriber') }}

{{Form::close()}}