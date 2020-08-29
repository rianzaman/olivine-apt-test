<?php

namespace App\Listeners;

use App\Events\UserVerificationEvent;
use App\Mail\UserVerificationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class UserVerificationEventListener
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
     * @param  UserVerificationEvent  $event
     * @return void
     */
    public function handle(UserVerificationEvent $event)
    {
        Mail::to($event->user->email)->send(new UserVerificationEmail($event->user));
    }
}
