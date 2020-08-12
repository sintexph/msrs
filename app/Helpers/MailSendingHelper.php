<?php

namespace App\Helpers;

use App\Mail\Outsource\ApprovedMailable as OutsourceApproved;
use App\Mail\Outsource\ApprovalMailable as OutsourceApproval;
use App\Mail\Outsource\DeniedMailable as OutsourceDenied;

use App\Mail\Request\ApprovedMailable as RequestApproved;
use App\Mail\Request\ApprovalMailable as RequestApproval;
use App\Mail\Request\DeniedMailable as RequestDenied;

use App\Mail\Completions\ApprovedMailable as CompletionsApproved;
use App\Mail\Completions\ApprovalMailable as CompletionsApproval;
use App\Mail\Completions\DeniedMailable as CompletionsDenied;

use Mail;
use App\User;
use App\ServiceRequest;

class MailSendingHelper
{
    public static function sendRequestApproval(ServiceRequest $service_request)
    {
        Mail::to('--- email here')->send(new RequestApproval($service_request));
    }

    public static function sendRequestApproved(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new RequestApproved($user,$service_request));
    }

    public static function sendRequestDenied(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new RequestDenied($user,$service_request));
    }



    public static function sendOutsourceApproval(ServiceRequest $service_request)
    {
        Mail::to('---- email here')->send(new OutsourceApproval($service_request));
    }

    public static function sendOutsourceApproved(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new OutsourceApproved($user,$service_request));
    }

    public static function sendOutsourceDenied(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new OutsourceDenied($user,$service_request));
    }


    public static function sendCompletionsApproval(ServiceRequest $service_request)
    {
        Mail::to('--- email here')->send(new CompletionsApproval($service_request));
    }

    public static function sendCompletionsApproved(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new CompletionsApproved($user,$service_request));
    }

    public static function sendCompletionsDenied(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new CompletionsDenied($user,$service_request));
    }


}
