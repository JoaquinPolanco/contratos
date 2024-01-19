<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'client';

    public function contracts()
    {
        return $this->hasMany(ClientContract::class, 'client_id', 'id');
    }
    
    public function references()
    {
        return $this->hasMany(ClientReference::class, 'client_id', 'id');
    }
}
