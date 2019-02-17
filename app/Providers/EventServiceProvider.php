<?php

namespace App\Providers;

use App\Http\Event\OrderCompletedEvent;
use App\Http\Event\OrderCreatedEvent;

use App\Http\Event\OrderListener;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderCreatedEvent::class => [
            OrderListener::class,
        ],
        OrderCompletedEvent::class => [
            OrderListener::class,
        ],
    ];

    protected $subscribe = [
        'App\Http\Event\OrderEventSubscriber',
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
