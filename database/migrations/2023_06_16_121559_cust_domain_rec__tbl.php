<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustDomainRecTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cust_domain_rec__tbl', function (Blueprint $table) {
            $table->id();
            $table->integer('cust_id')->nullable();
            $table->string('cust_domain_name')->nullable();
            $table->date('cust_domain_start_date')->nullable();
            $table->date('cust_domain_renewal_date')->nullable();
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
        Schema::dropIfExists('cust_domain_rec__tbl');
    }
}
