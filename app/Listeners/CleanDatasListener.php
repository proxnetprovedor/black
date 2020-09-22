<?php

namespace App\Listeners;

use App\Events\CleanDatasEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CleanDatasListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CleanDatasEvent  $event
     * @return void
     */
    public function handle(CleanDatasEvent $event)
    {
        $costumer = $event->costumer;
        $request = $event->request;

        if ($request->type_person == 'pf') {
            $costumer->person->insc_estadual = null;
            $costumer->person->insc_municipal = null;
            $costumer->person->save();

        } elseif ($request->type_person == 'pj') {
            $costumer->civil_state = null;
            $costumer->birth = null;
            $costumer->save();
            $costumer->person->documento = null;
            $costumer->person->save();
        }

    }
}
