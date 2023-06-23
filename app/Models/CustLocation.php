<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustLocation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cust_location_rec__tbl';
    protected $fillable = [
        'cust_id',
        'cust_location_name',
        'cust_location_add1',
        'cust_location_add2',
        'cust_location_suburb',
        'cust_location_state',
        'cust_location_postcode',
        'cust_location_country'
    ];
}
