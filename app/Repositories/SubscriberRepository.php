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

        return DB::table($this->subscriber->getTable())->insert([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'link_id'    => $uuid,
            'expired_on' => now()->addMonth(3),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function unsubscribe($id){

        return DB::table($this->subscriber->getTable())->whereId($id)
            ->update(['is_subscribed' => 0]);
    }

    public function update($data){
        return DB::table($this->subscriber->getTable())->whereId($data['id'])
           ->update([
               'name'          => $data['name'],
               'email'         => $data['email'],
               'is_subscribed' => $data['is_subscribed'],
               'expired_on'    => $data['expired_on'],
           ]);
    }

}