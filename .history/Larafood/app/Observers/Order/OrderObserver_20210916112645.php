<?php

namespace App\Observers\Order;
use App\Models\Order;
use Illuminate\Support\Str;

class OrderObserver
{
    
        /**
         * Handle the Order "created" event.
         *
         * @param  \App\Models\Order  $order
         * @return void
         */
        public function creating(Order $order)
        {
            $order->uuid = Str::uuid();
            $order->password = bcrypt($order->password);
        }
    
        /**
         * Handle the Order "updated" event.
         *
         * @param  \App\Models\Models\Order  $order
         * @return void
         */
        public function updating(Order $order)
        {
            $order->password = bcrypt($order->password);
        }
}
