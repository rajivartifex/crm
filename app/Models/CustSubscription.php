<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustSubscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cust_subscription_rec__tbl';

    protected $fillable = [
        'cust_id',
        'cust_sub_website_name',
        'cust_sub_domain_name',
        'cust_sub_solution_id',
        'cust_sub_plan',
        'cust_sub_pricing',
        'cust_sub_payment_mode_id',
        'cust_sub_start_date',
        'cust_sub_renewal_date'
    ];

    public function solution()
    {
        return $this->hasOne(Solution::class,'id','cust_sub_solution_id');
    }

    public function paymentmode()
    {
        return $this->hasOne(PaymentMode::class,'id','cust_sub_payment_mode_id');
    }
}
