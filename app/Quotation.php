<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = [
        'id_request',
        'with_quotation',
        'contractor',
        'bem_approved',
        'bem_aproved_by',
        'bem_aproved_at',
        'factory_approved',
        'factory_approved_by',
        'factory_approved_at',
        'project_approved',
        'project_approved_by',
        'project_approved_at',
        'need_regional_approval',
        'regional_approved',
        'regional_approval_by',
        'regional_approval_at',
        'bem_email',
        'factory_email',
        'project_email',
        'regional_email',
    ];

    
    
}
