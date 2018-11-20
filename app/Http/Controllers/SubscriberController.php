<?php

namespace App\Http\Controllers;

use App\Subscriber;
use App\Repositories\SubscriberRepository;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSubscriberRequest;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(77);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriberRequest $request, SubscriberRepository $subscriberRepo)
    {
       $user_link = $subscriberRepo->subscriber_add($request->except(['_token', '_method']));

        if($user_link){
            return redirect()->route('materials.index',['uuid' => $user_link]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        //
    }
}
