<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $fillable = [
        'id_request', 
        'with_material',
        'with_estimate',
        'with_design',
        'with_permit',
        'with_schedule',
        'other',
        'bem_approved',
        'bem_approved_by',
        'bem_approved_at',
        'ehss_approved',
        'ehss_approved_by',
        'ehss_approved_at',
        'dept_approved',
        'dept_approved_by',
        'dept_approved_at',
        'factory_approved',
        'factory_approved_by',
        'factory_approved_at',        
        'project_approved',        
        'project_approved_by',        
        'project_approved_at',        
        'outsource_received',        
        'outsource_received_by',        
        'outsource_received_at',
        'bem_email',
        'ehss_email',
        'dept_email',
        'factory_email',
        'project_email',
    ];



    protected $appends = [
        'has_attachment',
        'request_approval',
        'is_approved'
        // 'service_source'
    ];

    public function getHasAttachmentAttribute()
    {
        return (
                ($this->with_material == 1 ? true : false) || 
                ($this->with_estimate == 1 ? true : false)  || 
                ($this->with_design == 1 ? true : false)  || 
                ($this->with_permit == 1 ? true : false)
            );
    }

    public function service_request()
    {
        return $this->belongsTo('App\ServiceRequest', 'id_request');
    }
    
    public function getRequestApprovalsAttribute()
    { 
        $array = 
        [
            (object) ['approver' => $this->bem_approved_by, 'status' => ($this->bem_approved === 1 ? 'Approved' : ( $this->bem_approved === 0 ? 'Denied' : 'Pending')), 
                        'date' => $this->bem_approved_at ?? '(TBD)', 'position' => 'BEM Manager'],

            (object) ['approver' => $this->ehss_approved_by, 'status' => ($this->ehss_approved === 1 ? 'Approved' : ( $this->ehss_approved === 0 ? 'Denied' : 'Pending')), 
                        'date' => $this->ehss_approved_at ?? '(TBD)', 'position' => 'EHSS Manager'],

            (object) ['approver' =>  $this->dept_approved_by, 'status' => ($this->dept_approved === 1 ? 'Approved' : ( $this->dept_approved === 0 ? 'Denied' : 'Pending')), 
                        'date' => $this->dept_approved_at ?? '(TBD)', 'position' => 'Department Manager'],

            (object) ['approver' =>  $this->factory_approved_by, 'status' => ($this->factory_approved === 1 ? 'Approved' : ( $this->factory_approved === 0 ? 'Denied' : 'Pending')), 
                        'date' => $this->factory_approved_at ?? '(TBD)', 'position' => 'Factory Manager']
       ];

       if($this->service_request->evaluation->is_inhouse === 0)
       {
           $array[] = (object) ['approver' =>  $this->project_approved_by, 'status' => ($this->project_approved === 1 ? 'Approved' : ( $this->project_approved === 0 ? 'Denied' : 'Pending')), 
                                    'date' => $this->project_approved_at ?? '(TBD)', 'position' => 'Project Manager'];
       }

       return $array = (object) $array;
    }
    
    public function getIsApprovedApprovalAttribute()
    {
        $bem_approved = $this->bem_approved === 1 ? true : false;
        $ehss_approved = $this->ehss_approved === 1 ? true : false;
        $dept_approved = $this->dept_approved === 1 ? true : false;
        $factory_approved = $this->factory_approved === 1 ? true : false;

        $project_approved = $this->project_approved_email == null ? true : ($this->project_approved === 1 ? true : false);

        $is_approved = $this->service_request->status != 'Denied' ||  $this->service_request->status != 'Cancelled' ? true : false;
        
        return($bem_approved && $ehss_approved && $dept_approved && $factory_approved && $project_approved && $is_approved);
    }

    public function getIsApprovedQuotationAttribute()
    {        
        $is_approved = $this->service_request->status == 'Denied' || $this->service_request->status != 'Cancelled'? false : true;

        $factory_approved = $this->service_request->quotation->factory_approved;
        $project_approved = $this->service_request->quotation->project_approved;

        //$regional_approved = $this->regional_approved === 1 ? true : $this->regional_approved == null ? 1 : 0;

        if($this->service_request->evaluation->is_inhouse === 1)
        {
            $regional_approved = true;
        }
        else
        {
            $regional_approved = $this->regional_approved === 1 ? true : false;
        }

        return ($is_approved && $factory_approved && $project_approved && $regional_approved);
    }

    

    public function getIsApprovedCompletionAttribute()
    {
        $is_approved = $this->service_request->status != 'Denied' ||  $this->service_request->status != 'Cancelled' ? true : false;

        $bem_approved = $this->bem_approved === 1 ? true : false;
        $dept_approved = $this->dept_approved === 1 ? true : false;
        $is_approved = $this->service_request->status == 'Denied' ? false : true;

        return ($bem_approved && $dept_approved &&is_approved);
    }



}
