<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustMarketing extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cust_marketing_rec__tbl';

    protected $fillable = [
        'cust_id',
        'cust_mark_domain_name',
        'cust_mark_type_id',
        'cust_mark_start_date',
        'cust_mark_renewal_date',
        'cust_mark_plan',
        'cust_mark_pricing',
        'cust_mark_payment_mode_id'
    ];

    public function marketingtype()
    {
        return $this->hasOne(Marketing::class,'id','cust_mark_type_id');
    }

    public function paymentmode()
    {
        return $this->hasOne(PaymentMode::class,'id','cust_mark_payment_mode_id');
    }
}
