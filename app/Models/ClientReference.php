<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientReference extends Model
{
    protected $table = 'client_reference';
    
    public function client()
    {
        return $this->belongsTo(Cliente::class, 'client_id', 'id');
    }
}