<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cust_log_rec__tbl';
    protected $fillable = [
        'cust_id',
        'cust_log'
    ];
}
