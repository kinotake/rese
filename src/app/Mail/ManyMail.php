<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ManyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$title,$unique_emails)
    {
        $this->content = $content;
        $this->title = $title;
        $this->unique_emails = $unique_emails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->unique_emails)
        ->subject($this->title)
        ->view('send.make_send')
        ->with(['content' => $this->content]);
    }
}
