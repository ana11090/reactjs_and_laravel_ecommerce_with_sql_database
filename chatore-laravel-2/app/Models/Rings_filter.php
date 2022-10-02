<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rings_filter extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'ring_filter_band',
        'ring_filter_style	',
        'ring_filter_special',
        'ring_filter_gift',
           
        
    ];
}
