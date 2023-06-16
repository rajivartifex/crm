<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustDomain extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cust_domain_rec__tbl';
    protected $fillable = [
        'cust_id',
        'cust_domain_name',
        'cust_domain_start_date',
        'cust_domain_renewal_date'
    ];
}
