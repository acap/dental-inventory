<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 09/02/2019
 * Time: 11:40 AM
 */

namespace App\Http\Event;


use App\Http\Model\Order;

class OrderCompletedEvent extends OrderEvent
{

    public function __construct(Order $order)
    {
        parent::__construct($order);
    }
}
