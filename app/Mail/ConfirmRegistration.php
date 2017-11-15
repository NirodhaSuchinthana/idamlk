<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmRegistration extends Mailable
{
    use Queueable, SerializesModels;

    protected $user, $pin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $pin)
    {
        $this->user = $user;
        $this->pin = $pin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.verify')->with(['user' => $this->user, 'pin' => $this->pin]);
    }
}
