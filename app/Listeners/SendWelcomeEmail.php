<?php

namespace App\Listeners;

use App\Mail\WelcomeUserEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
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
     */
    public function handle(Registered $event): void
    {
        Log::info('The SendWelcomeEmail listener has successfully caught the event for user: '.$event->user->email);
        //
        Mail::to($event->user->email)->send(new WelcomeUserEmail($event->user));
    }
}
