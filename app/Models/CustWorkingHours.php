<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustWorkingHours extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cust_working_hours_rec__tbl';

    protected $fillable = [
        'cust_id',
        'cust_working_hours'
    ];
}
