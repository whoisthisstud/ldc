<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendClubCard extends Mailable
{
    use Queueable, SerializesModels;

    //public $city;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        //$this->city = $city;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Local Discount Card!')
            ->markdown('emails.club-card');
            // ->attach('/path/to/file', [
            //     'as' => 'name.pdf',
            //     'mime' => 'application/pdf',
            // ]);
            // ->attachFromStorage('/path/to/file', 'name.pdf', [
            //     'mime' => 'application/pdf'
            // ]);
            // ->attachData($this->pdf, 'name.pdf', [
            //     'mime' => 'application/pdf',
            // ]);
    }
}
