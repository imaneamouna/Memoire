<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productColorSize extends Model
{use HasFactory;
    protected $fillable = [ 'id', 'product_size_id', 'product_color_id', 'quantity','second_price', 'second_discount', 'status'];
    protected $table = 'product_color_size';


    public function productColor()
    {
        return $this->belongsTo(ProductColor::class);
    }

    public function productSize()
    {
        return $this->belongsTo(ProductSize::class);
    }
}

