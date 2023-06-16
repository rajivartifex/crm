<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustPayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cust_payment_rec__tbl';

    protected $fillable = [
        'cust_id',
        'cust_payment_id'
    ];

    protected $casts = [
        'cust_payment_id' => 'array'
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class,'id','cust_payment_id');
    }

}
