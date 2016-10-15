<?php

namespace CodePress\CodeUser\Providers;

use CodePress\CodeUser\Event\UserCreatedEvent;
use CodePress\CodeUser\Listeners\EmailCreatedAccountListener;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserCreatedEvent::class => [
            EmailCreatedAccountListener::class
        ]
    ];

    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
    }
}
