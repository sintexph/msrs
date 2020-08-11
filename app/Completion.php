<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Completion extends Model
{
    protected $fillable = [
        'id_request',      
        'performed_by',
        'po_number',
        'completion_date',
        'bem_approved',      
        'bem_approved_by',      
        'bem_approved_at',
        'dept_approved',      
        'dept_approved_by',      
        'dept_approved_at',      
        'bem_email',
        'dept_email',
        'report_number'
    ];
}
