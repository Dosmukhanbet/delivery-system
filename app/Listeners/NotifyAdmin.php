<?php

namespace App\Listeners;

use App\User;
use App\Mail\OrderCreated;
use App\Events\OrderWasCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdmin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderWasCreated  $event
     * @return void
     */
    public function handle(OrderWasCreated $event)
    {
     $admin = User::whereType('admin')->first();

     Mail::to($admin)->send(new OrderCreated($event->order));
    }
}
