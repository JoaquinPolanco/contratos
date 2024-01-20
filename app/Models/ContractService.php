<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractService extends Model
{
    protected $table = 'contract_service';
    public $timestamps = false; 

    protected $fillable = [
        'contract', 
        'service',
        
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_number', 'contract');
    }
}