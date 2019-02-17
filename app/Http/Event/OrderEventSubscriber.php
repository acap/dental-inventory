<?php

namespace App\Http\Event;

use App\Http\Model\Order;
use App\Http\Model\OrderItem;
use App\Http\Model\StockEntry;

class OrderEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function eventCreated($event)
    {
        info("OrderEventSubscriber: Order created: " . $event->order->ORDER_NO);
    }

    /**
     * Handle user logout events.
     */
    public function eventCompleted($event)
    {
        info("Order x completed: " . $event->order->ORDER_NO);
        $order = Order::where("ORDER_NO", $event->order->ORDER_NO)
            ->first();
        $orderItems = OrderItem::where('ORDER_ID', "=", $order->ID)
            ->get();
        info("Items: " . $orderItems->count());
        foreach ($orderItems as $item) {
            StockEntry::create([
                'QUANTITY' => (-1 * $item->QUANTITY),
                'STOCK_CODE_ID' => $item->STOCK_CODE_ID
            ]);

        }
    }

    /**
     * Register the listeners for the subscriber.
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Http\Event\OrderCreatedEvent',
            'App\Http\Event\OrderEventSubscriber@eventCreated'
        );
        $events->listen(
            'App\Http\Event\OrderCompletedEvent',
            'App\Http\Event\OrderEventSubscriber@eventCompleted'
        );
    }
}
