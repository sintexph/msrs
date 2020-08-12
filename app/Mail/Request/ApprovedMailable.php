<?php

namespace App\Mail\Request;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ServiceRequestTrait;

class ApprovedMailable extends Mailable
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

        return $this->view('mail.request.approved');
    }
}
