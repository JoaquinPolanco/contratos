<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contract';
    
    const UPDATED_AT = null; // Desactiva el campo updated_at

    protected $fillable = [
        'contract_number', // Agrega el campo 'contract_number' a $fillable
        'user_id',
        'revised',
        'location',
        // Otros campos que deseas permitir en asignación masiva
    ];

    public function services()
    {
        return $this->belongsToMany(CategoriesService::class, 'contract_services', 'contract_number', 'service');
    }

    public function client()
    {
        return $this->belongsTo(Cliente::class, 'user_id', 'id');
    }
}
