<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriesService extends Model
{
    protected $table = 'categories_services'; 

    protected $fillable = [
        'id', 
        'name',
    ];

}
