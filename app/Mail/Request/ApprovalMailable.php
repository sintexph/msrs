<?php

namespace App\Mail\Request;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ServiceRequestTrait;

class ApprovalMailable extends Mailable
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
        $this->subject="";
        
        /**
         * Can modify the receiver name here
         */
        //  $this->receiver=$this->user->name;
        //  $this->receiver="some name";


        return $this->view('mail.request.approval');
    }
}
