<?php

namespace App\Repositories;

use App\Subscriber;
use DB;

class SubscriberRepository
{
    protected $subscriber;

    function __construct(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    public function subscriber_add($data)
    {
        //Todo use uuid v4 or longer uuid
        $uuid = uniqid();

        $new_subscriber = DB::table($this->subscriber->getTable())->insert([
            'name' => $data['name'],
            'email' => $data['email'],
            'link_id' => $uuid,
            'expired_on' => now()->addMonth(3),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($new_subscriber) {
            return $uuid;
        }

        return false;
    }

    public function unsubscribe($id){
        $unsubscribe = Subscriber::find($id);

        DB::table($this->subscriber->getTable())->where('id',  $id)
            ->update(['is_subscribed' => 0]);
        if ($unsubscribe) {
            return true;
        }

        return false;
    }
}