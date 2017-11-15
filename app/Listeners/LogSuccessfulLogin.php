<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login as Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;

class LogSuccessfulLogin
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        return DB::table('user')
          ->where('id', $event->user->id)
          ->update([
                'terakhir_login' => CarbonDate('Y-m-d')
            ]);
    }
}
