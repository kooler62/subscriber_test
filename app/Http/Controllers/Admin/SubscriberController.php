<?php

namespace App\Http\Controllers\Admin;

use App\Subscriber;
use App\Repositories\SubscriberRepository;
use App\Http\Requests\StoreSubscriberRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function index()
    {
        $subscribers = Subscriber::paginate(10);
        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function create()
    {
        return view('admin.subscribers.create');
    }

    public function store(StoreSubscriberRequest $request, SubscriberRepository $subscriberRepo)
    {
        $subscriberRepo->subscriber_add($request->except(['_token', '_method']));
        return redirect()->route('admin.subscribers.index');
    }

    public function show(Subscriber $subscriber)
    {
        return view('admin.subscribers.show', compact('subscriber'));
    }

    public function edit(Subscriber $subscriber)
    {
        return view('admin.subscribers.edit', compact('subscriber'));
    }

    public function update(Request $request, Subscriber $subscriber, SubscriberRepository $subscriberRepo)
    {
        $subscriberRepo->update($request->except(['_token', '_method']));
        return redirect()->route('admin.subscribers.index');
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber::destroy($subscriber->id);
        return redirect()->route('admin.subscribers.index');
    }
}
