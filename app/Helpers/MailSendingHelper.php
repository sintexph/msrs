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

    /**
     * Completion approval 
     */
    public static function approval_completion_bem(){
        
        $url=URL::signedRoute('approval.completion.bem', now()->addDays(30) , ['serviceRequest' => $service_request->id]);
        
        Mail::to('--- email here')->send(new CompletionsApproval($service_request,null,$url));

    }

    public static function approval_completion_dept(){
        
        $url=URL::signedRoute('approval.completion.dept', now()->addDays(30) , ['serviceRequest' => $service_request->id]);
        Mail::to('--- email here')->send(new CompletionsApproval($service_request,null,$url));

    }


    /**
     * Outsource approval 
     */
    public static function approval_outsource_bem(){
        
        $url=URL::signedRoute('approval.outsource.bem', now()->addDays(30) , ['serviceRequest' => $service_request->id]);
        Mail::to('---- email here')->send(new OutsourceApproval($service_request,null,$url));

    }

    public static function approval_outsource_factory(){

        $url=URL::signedRoute('approval.outsource.factory', now()->addDays(30) , ['serviceRequest' => $service_request->id]);
        Mail::to('---- email here')->send(new OutsourceApproval($service_request,null,$url));

    }

    public static function approval_outsource_project(){
        
        $url=URL::signedRoute('approval.outsource.project', now()->addDays(30) , ['serviceRequest' => $service_request->id]);
        Mail::to('---- email here')->send(new OutsourceApproval($service_request,null,$url));

    }

    public static function approval_outsource_regional(){
        
        $url=URL::signedRoute('approval.outsource.regional', now()->addDays(30) , ['serviceRequest' => $service_request->id]);
        Mail::to('---- email here')->send(new OutsourceApproval($service_request,null,$url));

    }


    /**
     * Request approval 
     */
    public static function approval_request_bem(){
        
        $url=URL::signedRoute('approval.request.bem', now()->addDays(30) , ['serviceRequest' => $service_request->id]);
        Mail::to('--- email here')->send(new RequestApproval($service_request,null,$url));

    }

    public static function approval_request_dept(){
        
        $url=URL::signedRoute('approval.request.dept', now()->addDays(30) , ['serviceRequest' => $service_request->id]);
        Mail::to('--- email here')->send(new RequestApproval($service_request,null,$url));

    }

    public static function approval_request_ehss(){
        
        $url=URL::signedRoute('approval.request.ehss', now()->addDays(30) , ['serviceRequest' => $service_request->id]);
        Mail::to('--- email here')->send(new RequestApproval($service_request,null,$url));

    }

    public static function approval_request_factory(){
        
        $url=URL::signedRoute('approval.request.factory', now()->addDays(30) , ['serviceRequest' => $service_request->id]);
        Mail::to('--- email here')->send(new RequestApproval($service_request,null,$url));

    }

    public static function approval_request_project(){
        
        $url=URL::signedRoute('approval.request.project', now()->addDays(30) , ['serviceRequest' => $service_request->id]);
        Mail::to('--- email here')->send(new RequestApproval($service_request,null,$url));

    }


 

    private static function sendRequestApproved(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new RequestApproved($service_request,$user));
    }

    private static function sendRequestDenied(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new RequestDenied($service_request,$user));
    }

    private static function sendOutsourceApproved(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new OutsourceApproved($service_request,$user));
    }

    private static function sendOutsourceDenied(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new OutsourceDenied($service_request,$user));
    }


    private static function sendCompletionsApproved(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new CompletionsApproved($service_request,$user));
    }

    private static function sendCompletionsDenied(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new CompletionsDenied($service_request,$user));
    }


}
