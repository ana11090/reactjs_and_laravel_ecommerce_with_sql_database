<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainStone extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'main_stone_type',
        'main_stone_color',
         'main_stone_carat',
         'main_stone_mm',
         'main_stone_gr',
        'main_stone_clarity',
        'main_stone_cut',
        'main_stone_shape',
        
    ];
}
