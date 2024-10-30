<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;

class SentEmailMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectText;
    public $messageText;

    public function __construct($emailData)
    {
        $this->subjectText = $emailData['subject'];
        $this->messageText = $emailData['message'];
    }

    public function build()
    {
        return $this->subject($this->subjectText)
        ->replyTo(Auth::user()->email)
            ->view('emails.sent')
            ->with([
                'messageText' => $this->messageText,
            ]);
    }
}
