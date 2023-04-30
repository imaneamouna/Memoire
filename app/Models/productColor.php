<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productColor extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'product_id', 'color'];
    protected $table = 'product_color';
}
