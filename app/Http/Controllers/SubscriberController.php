<?php

namespace App\Http\Controllers;

use App\Subscriber;
use App\Repositories\SubscriberRepository;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubscriberRequest;

class SubscriberController extends Controller
{
    public function index()
    {
        dd(77);
    }

    public function create()
    {
        //
    }

    public function store(StoreSubscriberRequest $request, SubscriberRepository $subscriberRepo)
    {
       $user_link = $subscriberRepo->subscriber_add($request->except(['_token', '_method']));

        if($user_link){
            return redirect()->route('materials.index',['uuid' => $user_link]);
        }
        return back();
    }

    public function show(Subscriber $subscriber)
    {
        //
    }

    public function edit(Subscriber $subscriber)
    {
        //
    }

    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }


    public function unSubscribe($uuid, SubscriberRepository $subscriberRepo)
    {
        $subscriber = Subscriber::where('link_id', $uuid)->firstOrFail();

        if( $subscriberRepo->unsubscribe($subscriber->id)){
            return view('unsubscribe');
        }
        abort(401);
    }

    public function destroy(Subscriber $subscriber)
    {
        //
    }
}
