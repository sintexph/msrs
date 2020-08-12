<?php

namespace App\Mail;

use App\User;
use App\ServiceRequest;

trait ServiceRequestTrait 
{
    public $user;
    public $service_request;
    public $receiver;
    public $url;

    public function __construct(ServiceRequest $service_request,User $user=null,$url=null)
    {
        $this->user=$user;
        $this->service_request=$service_request;
        $this->url=$url;
    }
}
