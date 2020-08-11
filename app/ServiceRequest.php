<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = [
        'id_user', 
        'factory',
        'details',
        'purpose',
        'completion_date',
        'feasible_date',
        'is_approved',
        'approved_by',
        'approved_at',
        'status'
    ];

    protected $casts = [
        'pre_implementation' => 'array',
    ];

    protected $appends = [
        'class_status'
    ];

    public function creator()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function evaluation()
    {
        return $this->hasOne('App\Evaluation', 'id_request');
    }

    public function approval()
    {
        return $this->hasOne('App\Approval', 'id_request');
    }

    public function quotation()
    {
        return $this->hasOne('App\Quotation', 'id_request');
    }

    public function completion()
    {
        return $this->hasOne('App\Completion', 'id_request');
    }

    public function getClassStatusAttribute()
    {
        $class;

        switch($this->status)
        {
            case 'Processing':
                $class = 'label-warning';
            break;

            case 'Denied':
                $class = 'label-danger';
            break;
            
            case 'Cancelled':
                $class = 'label-danger';
            break;

            case 'Completed':
                $class = 'label-success';
            break;

            case 'Approved':
                $class = 'label-success';
            break;

            default:
                $class = 'label-info';
            break;
        }

        return $class;
    }


    
}