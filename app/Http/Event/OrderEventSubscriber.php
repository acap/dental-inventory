<?php

namespace App\Http\Event;

class OrderEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function eventCreated($event)
    {
        info("Order created: " . $event->order->ORDER_NO);
    }

    /**
     * Handle user logout events.
     */
    public function eventCompleted($event)
    {
        info("Order completed: " . $event->order->ORDER_NO);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Http\Event\OrderEventCreated',
            'App\Http\Event\OrderEventSubscriber@eventCreated'
        );
        $events->listen(
            'App\Http\Event\OrderEventCompleted',
            'App\Http\Event\OrderEventSubscriber@eventCompleted'
        );
    }
}
