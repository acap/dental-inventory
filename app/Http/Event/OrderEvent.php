<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 09/02/2019
 * Time: 11:42 AM
 */

namespace App\Http\Event;


use App\Http\Model\Order;
use Illuminate\Queue\SerializesModels;

class OrderEvent
{

    use SerializesModels;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}
