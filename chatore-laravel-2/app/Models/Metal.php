<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Metal extends Model
{
    use HasFactory;
    protected $fillable = [
         'product_name' ,
         'metal_type' ,
         'metal_color' ,
         'metal_plating' ,
         'metal_plating_color',
         'metal_gr' ,
    ];
}
