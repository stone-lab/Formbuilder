<?php

namespace Modules\Formbuilder\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class FormbuilderEventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
            'Modules\Formbuilder\Events\FormbuilderEvent' => [
                    'Modules\Formbuilder\Listener\FormbuilderHandler',
            ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param \Illuminate\Contracts\Events\Dispatcher $events
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
