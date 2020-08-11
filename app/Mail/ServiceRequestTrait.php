<?php

namespace App\Mail;

use App\User;
use App\ServiceRequest;

trait ServiceRequestTrait 
{
    public $user;
    public $service_request;

    public function __construct(User $user,ServiceRequest $service_request)
    {
        $this->user=$user;
        $this->service_request=$service_request;
    }
}
