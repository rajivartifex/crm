<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustWeb extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cust_web_rec__tbl';

    protected $fillable = [
        'cust_id',
        'cust_media_name',
        'cust_media_link'
    ];
}
