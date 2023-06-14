<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustAboutEmp extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cust_about_emp_rec__tbl';
    protected $fillable = [
        'cust_id',
        'cust_of_emps'
    ];
}
