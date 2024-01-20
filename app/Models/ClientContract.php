<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientContract extends Model
{
    protected $table = 'client_contract';
    public $timestamps = false; 
    
    protected $fillable = [
        'contract',
        'client',
        'principal',
     
    ];
    
    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_number', 'contract');
    }
    
    public function client()
    {
        return $this->belongsTo(Cliente::class, 'client_id', 'id');
    }
}