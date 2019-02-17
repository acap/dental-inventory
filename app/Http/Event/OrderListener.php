<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 09/02/2019
 * Time: 11:41 AM
 */

namespace App\Http\Event;


class OrderListener
{

    public function __construct()
    {
    }

    public function handle(OrderEvent $event)
    {
        info("Order created: " . $event);

        // email
        // notification
        // audit trail

        if($event instanceof OrderCompletedEvent){
        }
    }
}
