<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendDailyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $daily;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($daily)
    {
        $this->daily = $daily;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Daily Task')->view('emails.senddaily');
    }
}
