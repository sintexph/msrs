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

use URL;
use Mail;
use App\User;
use App\ServiceRequest;

class MailSendingHelper
{

    /**
     * Completion approval 
     * @param $service_request Instance of ServiceRequest model
     */
    public static function approval_completion_bem(ServiceRequest $service_request){
        
        $url=URL::temporarySignedRoute('approval.completion.bem', now()->addDays(30) , ['serviceRequest' => $service_request->id]);
        Mail::to($service_request->completion->bem_email)
        ->send(new CompletionsApproval($service_request,null,$url,$service_request->completion->bem_approved_by));
        
    }

    /**
     *  @param $service_request Instance of ServiceRequest model
     */
    public static function approval_completion_dept(ServiceRequest $service_request){
        
        $url=URL::temporarySignedRoute('approval.completion.dept', now()->addDays(30) , ['serviceRequest' => $service_request->id]);

        Mail::to($service_request->completion->dept_email)
        ->send(new CompletionsApproval($service_request,null,$url,$service_request->completion->dept_approved_by));
    }


    /**
     * Outsource approval 
     */
    // public static function approval_outsource_bem(ServiceRequest $service_request){
        
    //     $url=URL::temporarySignedRoute('approval.outsource.bem', now()->addDays(30) , ['serviceRequest' => $service_request->id]);

    //     Mail::to($service_request->quotation->bem_email)
    //     ->send(new OutsourceApproval($service_request,null,$url,$service_request->quotation->bem_approved_by));

    // }


    /**
     *  @param $service_request Instance of ServiceRequest model
     */    
    public static function approval_outsource_factory(ServiceRequest $service_request){

        $url=URL::temporarySignedRoute('approval.outsource.factory', now()->addDays(30) , ['serviceRequest' => $service_request->id]);

        Mail::to($service_request->quotation->factory_email)
        ->send(new OutsourceApproval($service_request,null,$url,$service_request->quotation->factory_approved_by));

    }


    /**
     *  @param $service_request Instance of ServiceRequest model
     */
    public static function approval_outsource_project(ServiceRequest $service_request){

        $url=URL::temporarySignedRoute('approval.outsource.project', now()->addDays(30) , ['serviceRequest' => $service_request->id]);

        Mail::to($service_request->quotation->project_email)
        ->send(new OutsourceApproval($service_request,null,$url,$service_request->quotation->project_approved_by));

    }


    /**
     *  @param $service_request Instance of ServiceRequest model
     */
    public static function approval_outsource_regional(ServiceRequest $service_request){
        
        $url=URL::temporarySignedRoute('approval.outsource.regional', now()->addDays(30) , ['serviceRequest' => $service_request->id]);

        Mail::to($service_request->quotation->regional_email)
        ->send(new OutsourceApproval($service_request,null,$url,$service_request->quotation->regional_approved_by));
    }


    /**
     * Request approval
     * @param $service_request Instance of ServiceRequest model
     */
    public static function approval_request_bem(ServiceRequest $service_request){
        
        $url=URL::temporarySignedRoute('approval.request.bem', now()->addDays(30) , ['serviceRequest' => $service_request->id]);

        Mail::to($service_request->approval->bem_email)
            ->send(new RequestApproval($service_request,null,$url,$service_request->approval->bem_approved_by));
    }


    /**
     *  @param $service_request Instance of ServiceRequest model
     */
    public static function approval_request_dept(ServiceRequest $service_request){
        
        $url=URL::temporarySignedRoute('approval.request.dept', now()->addDays(30) , ['serviceRequest' => $service_request->id]);

        Mail::to($service_request->approval->dept_email)
        ->send(new RequestApproval($service_request,null,$url,$service_request->approval->dept_approved_by));

    }


    /**
     *  @param $service_request Instance of ServiceRequest model
     */
    public static function approval_request_ehss(ServiceRequest $service_request){
        
        $url=URL::temporarySignedRoute('approval.request.ehss', now()->addDays(30) , ['serviceRequest' => $service_request->id]);

        Mail::to($service_request->approval->ehss_email)
        ->send(new RequestApproval($service_request,null,$url,$service_request->approval->ehss_approved_by));

    }


    /**
     *  @param $service_request Instance of ServiceRequest model
     */
    public static function approval_request_factory(ServiceRequest $service_request){
        
        $url=URL::temporarySignedRoute('approval.request.factory', now()->addDays(30) , ['serviceRequest' => $service_request->id]);

        Mail::to($service_request->approval->factory_email)
        ->send(new RequestApproval($service_request,null,$url,$service_request->approval->factory_approved_by));

    }


    /**
     *  @param $service_request Instance of ServiceRequest model
     */
    public static function approval_request_project(ServiceRequest $service_request){
        
        $url=URL::temporarySignedRoute('approval.request.project', now()->addDays(30) , ['serviceRequest' => $service_request->id]);

        Mail::to($service_request->approval->project_email)
        ->send(new RequestApproval($service_request,null,$url,$service_request->approval->project_approved_by));
    }


    /**
     * @param $user Instance of User model, it is the receiver of the email notification
     * @param $service_request Instance of ServiceRequest model
     */
    public static function sendRequestApproved(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new RequestApproved($service_request,$user));
    }


    /**
     * @param $user Instance of User model, it is the receiver of the email notification
     * @param $service_request Instance of ServiceRequest model
     */
    public static function sendRequestDenied(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new RequestDenied($service_request,$user));
    }


    /**
     * @param $user Instance of User model, it is the receiver of the email notification
     * @param $service_request Instance of ServiceRequest model
     */
    public static function sendOutsourceApproved(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new OutsourceApproved($service_request,$user));
    }


    /**
     * @param $user Instance of User model, it is the receiver of the email notification
     * @param $service_request Instance of ServiceRequest model
     */
    public static function sendOutsourceDenied(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new OutsourceDenied($service_request,$user));
    }



    /**
     * @param $user Instance of User model, it is the receiver of the email notification
     * @param $service_request Instance of ServiceRequest model
     */
    public static function sendCompletionsApproved(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new CompletionsApproved($service_request,$user));
    }

    
    /**
     * @param $user Instance of User model, it is the receiver of the email notification
     * @param $service_request Instance of ServiceRequest model
     */
    public static function sendCompletionsDenied(User $user,ServiceRequest $service_request)
    {
        Mail::to($user->email)->send(new CompletionsDenied($service_request,$user));
    }


}
