<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cust_rec__tbl';

    protected $fillable = [
        'cust_business_name',
        'cust_business_country',
        'cust_business_telephone',
        'cust_business_website'
    ];

}
