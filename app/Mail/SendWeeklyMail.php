<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendWeeklyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $weekly;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($weekly)
    {
        $this->weekly = $weekly;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Weekly Task')->view('emails.sendweekly');
    }
}
