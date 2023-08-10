<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginImage extends Model
{
    use HasFactory;

    protected $table = 'login_images';

    protected $fillable = [
        'login_image',
    ];
}
