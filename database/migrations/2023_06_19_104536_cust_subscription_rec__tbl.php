<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustSubscriptionRecTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cust_subscription_rec__tbl', function (Blueprint $table) {
            $table->id();
            $table->integer('cust_id')->nullable();
            $table->string('cust_sub_website_name')->nullable();
            $table->string('cust_sub_domain_name')->nullable();
            $table->integer('cust_sub_solution_id')->nullable();
            $table->string('cust_sub_plan')->nullable();
            $table->bigInteger('cust_sub_pricing')->nullable();
            $table->integer('cust_sub_payment_mode_id')->nullable();
            $table->date('cust_sub_start_date')->nullable();
            $table->date('cust_sub_renewal_date')->nullable();
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
        Schema::dropIfExists('cust_subscription_rec__tbl');
    }
}
