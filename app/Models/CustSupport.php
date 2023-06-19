<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustSupport extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cust_support_rec__tbl';

    protected $fillable = [
        'cust_id',
        'cust_sup_product_name',
        'cust_sup_type_id',
        'cust_sup_start_date',
        'cust_sup_renewal_date',
        'cust_sup_plan',
        'cust_sup_pricing',
        'cust_sup_payment_mode_id'
    ];

    public function marketingType()
    {
        return $this->hasOne(Marketing::class,'id','cust_sup_type_id');
    }

    public function paymentMode()
    {
        return $this->hasOne(PaymentMode::class,'id','cust_sup_payment_mode_id');
    }

}
