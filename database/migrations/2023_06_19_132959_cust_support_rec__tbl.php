<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustSupportRecTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cust_support_rec__tbl', function (Blueprint $table) {
            $table->id();
            $table->integer('cust_id')->nullable();
            $table->string('cust_sup_product_name')->nullable();
            $table->integer('cust_sup_type_id')->nullable();
            $table->date('cust_sup_start_date')->nullable();
            $table->date('cust_sup_renewal_date')->nullable();
            $table->string('cust_sup_plan')->nullable();
            $table->integer('cust_sup_pricing')->nullable();
            $table->integer('cust_sup_payment_mode_id')->nullable();
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
        Schema::dropIfExists('cust_support_rec__tbl');
    }
}
