<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contact_info_rec__tbl';

    protected $fillable = [
        'con_first_name',
        'con_last_name',
        'con_email',
        'con_telephone',
        'con_fax',
        'con_date'
    ];
}
