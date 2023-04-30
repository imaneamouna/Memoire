<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title', 'description', 'address', 'phone', 'email', 'logo', 'favicon', 'facebook', 'twiter', 'instagram', 'youtube', 'tiktok'];
    protected $table = 'settings';

}
