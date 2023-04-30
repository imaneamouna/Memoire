<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userAddress extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id', 'adress', 'city', 'state', 'country', 'postal_code', 'phone', 'email', 'name', 'surname'];
    protected $table = 'user_addresses';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
