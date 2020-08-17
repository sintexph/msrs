<?php

namespace App\Mail;

use App\User;
use App\ServiceRequest;

trait ServiceRequestTrait 
{
    /**
     * Public variables that can be accessed in view(blade) file
     */
    public $user;
    public $service_request;
    public $receiver;
    public $url;


    /**
     * @param $service_request Instance of ServiceRequests model
     * @param $user Instance of User model, the receiver of the email notification (optional)
     * @param $url Use for expiring signed url for approver of the request (optional)
     * @param $receiver Receiver name and it is optional and alternatively you can use the $user instance to get the receiver name
     */
    public function __construct(ServiceRequest $service_request,User $user=null,$url=null,$receiver=null)
    {
        $this->user=$user;
        $this->service_request=$service_request;
        $this->receiver=$receiver;
        $this->url=$url;
    }
}
