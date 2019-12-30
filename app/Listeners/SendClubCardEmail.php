<?php

namespace App\Listeners;

use Mail;
use App\Mail\SendClubCard;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendClubCardEmail
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
     * @param  UserVerifiedEmail  $event
     * @return void
     */
    public function handle(Verified $event)
    {
        Mail::to($event->user->email)->send(
            new SendClubCard($event->user)
        );
        // Mail::send('email.activation', $payload, function(Message $message) use ($payload) {
        //         $message
        //             ->to($payload['user']->email)
        //             ->from('info@test.dev')
        //             ->subject('Welcome!');
        //     });
    }
}
