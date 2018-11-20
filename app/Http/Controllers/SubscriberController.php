<?php

namespace App\Http\Controllers;

use App\Subscriber;
use App\Repositories\SubscriberRepository;
use App\Http\Requests\StoreSubscriberRequest;

class SubscriberController extends Controller
{
    public function store(StoreSubscriberRequest $request, SubscriberRepository $subscriberRepo)
    {
       $user_link = $subscriberRepo->subscriber_add($request->except(['_token', '_method']));

        if($user_link){
            return redirect()->route('materials.index',['uuid' => $user_link]);
        }
        return back();
    }

    public function unSubscribe($uuid, SubscriberRepository $subscriberRepo)
    {
        $subscriber = Subscriber::where('link_id', $uuid)->firstOrFail();

        if( $subscriberRepo->unsubscribe($subscriber->id)){
            return view('unsubscribe');
        }
        abort(401);
    }
}
