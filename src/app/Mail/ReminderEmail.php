<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reserveData)
    {
        $this->reserveData = $reserveData;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->reserveData->user->email)
        ->subject('本日のご予約についてのリマインドメール')
        ->view('send.make_reminder')
        ->with(['reserveData' => $this->reserveData]);
    }
}
