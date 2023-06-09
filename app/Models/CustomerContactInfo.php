<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerContactInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cust_con_rec__tbl';

    protected $fillable = [
        'cust_id',
        'cust_con_id'
    ];

    public function contact()
    {
        return $this->hasOne(Contact::class,'id','cust_con_id');
    }
}
