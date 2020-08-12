<?php

namespace App\Mail;

use App\User;
use App\ServiceRequest;

trait ServiceRequestTrait 
{
    public $user;
    public $service_request;
    public $receiver;

    public function __construct(ServiceRequest $service_request,User $user=null)
    {
        $this->user=$user;
        $this->service_request=$service_request;
    }
}
