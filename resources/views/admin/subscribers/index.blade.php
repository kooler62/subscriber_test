<h2>All Subscribers</h2>

@foreach($subscribers as $subscriber)
    {{$subscriber->name}}
    {{$subscriber->email}}
    {{$subscriber->is_subscribed}}
    {{$subscriber->expired_on}}

    <a href="{{route('admin.subscribers.show', [ 'id' => $subscriber->id ])}}">show</a>
    <a href="{{route('admin.subscribers.edit', [ 'id' => $subscriber->id ])}}">edit</a>
    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.subscribers.destroy', $subscriber->id]]) !!}
    <button>Delete</button>
    {!! Form::close() !!}

    <br>
@endforeach

{{ $subscribers->links() }}
