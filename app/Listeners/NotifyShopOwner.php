<?php

namespace App\Listeners;

use App\Services\SMS;
use App\Events\OrderWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyShopOwner
{
    protected $sms;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(SMS $sms)
    {
        //
        $this->sms = $sms;
    }

    /**
     * Handle the event.
     *
     * @param  OrderWasCreated  $event
     * @return void
     */
    public function handle(OrderWasCreated $event)
    {
        $number = $event->order
                        ->shop
                        ->owner
                        ->mobile_number;
        $this->sms->send($number, $this->notification($event));
    }


   
    public function notification($event)
    {
        return 'У вас новая заявка. Ссылка ' . url( '/shops/' . $event->order->shop->slug . '/orders/'. $event->order->id);
    } 


}
