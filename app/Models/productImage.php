<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productImage extends Model
{

    use HasFactory;
    protected $fillable = ['id', 'product_id', 'image'];
    protected $table = 'product_images';



    public function productColorSize()
    {
        return $this->belongsTo(Product::class);
    }

}
