<?php

namespace App\Repositories;
use App\Models\Subscriber;
class SubscriberRepository
{
  public function userSubscription()
        {
          $subscription = Subscriber::with('user')->where('user_id', auth()->id())->where('status_id',1)->first();
          
          return $subscription;
  
        }

        public function userInactiveSubscription()
        {
          $subscription = Subscriber::with('user')->where('user_id', auth()->id())->where('status_id',2)->first();
          
          return $subscription;
  
        }

        public function user()
        {
         
          
          return auth()->id();
  
        }

      
}