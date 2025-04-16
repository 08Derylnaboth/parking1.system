<?php

namespace App\Observers;

use App\Models\Reservation;

class ReservationObserver
{
    /**
     * Handle the Reservation "created" event.
     */
    public function creating(Reservation $reservation): void
    {
        Reservation::query()
        ->whereNull(columns:'paid_at')
        ->where(column:'user_id',$reservation=>user_id)
        ->delete();
    }
   
    //  public function created(Reservation $reservation): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Reservation "updated" event.
    //  */
    // public function updated(Reservation $reservation): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Reservation "deleted" event.
    //  */
    // public function deleted(Reservation $reservation): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Reservation "restored" event.
    //  */
    // public function restored(Reservation $reservation): void
    // {
    //     //
    // }

    // /**
    //  * Handle the Reservation "force deleted" event.
    //  */
    // public function forceDeleted(Reservation $reservation): void
    // {
    //     //
    // }
}
