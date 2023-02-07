<?php

namespace App\Listeners;

use App\Models\Login;
use Illuminate\Auth\Events\Logout;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessFullLogout
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {

        $token = Login::where('user_id', \Auth::user()->id)->get();
        $lastToken = $token->last();
        
        $login = $event->user->logins()->where('session_token', $lastToken->session_token)->first();

         if ($login)
        {
            $login->logout_at = \Carbon\Carbon::now(); 
            $login->save();
        }

        
    }
}
