<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use URL;

class product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'description', 'image', 'main_price', 'discount_id', 'category_id', 'main_discount', 'color', 'size', 'quantity'];
    protected $table = 'products';


    public  function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function getImageAttribute($val)
    {
        return ($val !== null && Storage::disk('Employees')->exists($val)) ? URL::asset('storage/Employees/' . $val) : null;
    }

    //  public function productColor(){
    //      return $this->hasMany(ProductColor::class, 'product_id');
    //  }

    //  public function productSize(){
    //      return $this->hasMany(ProductSize::class, 'product_id');
    //  }

}
