<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'id_request', 
        'is_electrical',
        'is_mechanical',
        'is_civil',
        'is_others',
        'is_layout',
        'is_technical',
        'is_photograph',
        'is_drawing',
        'is_inhouse',
        'is_approved',
        'approved_by',
        'approved_at'        
    ];

    protected $appends = [
        'has_service_type',
        'has_implementation',
        // 'service_source'
    ];

    public function getHasServiceTypeAttribute()
    {
        return ($this->is_electrical == 1 ? true : false || $this->is_mechanical == 1 ? true : false  || $this->is_civil == 1 ? true : false  || $this->is_others == 1 ? true : false);
    }
    
    public function getHasImplementationAttribute()
    {
        return ($this->is_layout == 1 ? true : false || $this->is_technical == 1 ? true : false || $this->is_photograph == 1 ? true : false || $this->is_drawing == 1 ? true : false);
    }

    // public function getServiceSourceAttribute()
    // {
    //     return ($this->is_inhouse == null ? 'TBD' : ($this->is_inhouse == 1 ? 'In-house' : 'Outsource'));
    // }

    

}
