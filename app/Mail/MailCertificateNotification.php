<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailCertificateNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $personnel;
    protected $certificate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($personnel,$certificate)
    {
        $this->personnel = $personnel;
        $this->certificate = $certificate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your '.$this->certificate.' Certificate will expire soon')->view('email.certificate')->with(['personnel' => $this->personnel,'certificate' => $this->certificate]);
    }
}
