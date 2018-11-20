<h2>Wellcome {{$subscriber->name}}!</h2>

{!! Form::open(['method' => 'POST', 'route' => ['subscribers.unsubscribe', $subscriber->link_id]]) !!}
<button>unsubscribe</button>
{!! Form::close() !!}

<hr>
materials: <br>

@foreach($materials as $material)

    <a href="{{Crypt::encryptString("$material->id, $material->name, $material->src, " . now())}}/{{$material->src}}">{{$material->name}}</a>

@endforeach
