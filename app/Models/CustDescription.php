<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustDescription extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cust_desc_rec__tbl';
    protected $fillable = [
        'cust_id',
        'cust_short_desc',
        'cust_long_desc',
        'cust_alter_desc'
    ];
}
