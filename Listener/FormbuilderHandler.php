<?php

namespace Modules\Formbuilder\Listener;

use App\Events\FormbuilderEvent;

class FormbuilderHandler
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param PodcastWasPurchased $event
     */
    public function handle(FormbuilderEvent $event)
    {
        $eventName = $event->name;
    }
}
