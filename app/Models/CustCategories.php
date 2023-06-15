<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustCategories extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cust_categories_rec__tbl';

    protected $fillable = [
        'cust_id',
        'categories_id'
    ];

    public function categories()
    {
        return $this->hasOne(Categories::class, 'id','categories_id');
    }
}
