<?php

namespace App\Mail\Outsource;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ServiceRequestTrait;

class DeniedMailable extends Mailable
{
    use Queueable, SerializesModels;
    use ServiceRequestTrait;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->receiver=""; # Receiver name
        $this->subject="";

        return $this->view('mail.outsource.denied');
    }
}
