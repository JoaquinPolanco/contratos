<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientContract extends Model
{
    protected $table = 'client_contract';
    public $timestamps = false; // Desactiva las marcas de tiempo
    
    protected $fillable = [
        'contract',
        'client',
        'principal',
        // Otros campos que necesites
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