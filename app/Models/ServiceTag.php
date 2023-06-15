<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceTag extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'service_tag_rec__tbl';

    protected $fillable = [
        'cust_categories_id',
        'service_tag'
    ];
}
