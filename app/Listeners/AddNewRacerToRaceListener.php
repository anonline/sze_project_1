<?php

namespace App\Listeners;

use App\RaceRegistrationModel;
use App\RaceWaitingListModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddNewRacerToRaceListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        $waitlist_collection = RaceWaitingListModel::where('race_id', '=', $event->race_registration->race_id)->get();

        if(!is_null($waitlist_collection)){

        $waitlist = $waitlist_collection->sortBy('created_at')->first();

        $race = new RaceRegistrationModel(['user_id' => $waitlist->user_id, 'race_id' => $waitlist->race_id]);

        $race->save();

            }
    }
}
