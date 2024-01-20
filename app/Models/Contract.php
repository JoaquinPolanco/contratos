<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contract';
    
    const UPDATED_AT = null; 

    protected $fillable = [
        'contract_number', 
        'user_id',
        'revised',
        'location',
       
    ];

    public function services()
    {
        return $this->belongsToMany(CategoriesService::class, 'contract_service', 'contract', 'service');
    }

    public function client()
    {
        return $this->belongsTo(Cliente::class, 'user_id', 'id');
    }
}
