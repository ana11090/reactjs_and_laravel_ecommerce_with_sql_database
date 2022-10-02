<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{ 

    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'country',
        'county',
        'city',
        'street',
        'postal_code'
           
        
    ];
}
