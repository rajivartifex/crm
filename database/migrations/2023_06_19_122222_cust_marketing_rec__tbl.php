<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustMarketingRecTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cust_marketing_rec__tbl', function (Blueprint $table) {
            $table->id();
            $table->integer('cust_id')->nullable();
            $table->string('cust_mark_domain_name')->nullable();
            $table->integer('cust_mark_type_id')->nullable();
            $table->date('cust_mark_start_date')->nullable();
            $table->date('cust_mark_renewal_date')->nullable();
            $table->string('cust_mark_plan')->nullable();
            $table->integer('cust_mark_pricing')->nullable();
            $table->integer('cust_mark_payment_mode_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cust_marketing_rec__tbl');
    }
}
