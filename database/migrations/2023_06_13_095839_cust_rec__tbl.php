<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustRecTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cust_rec__tbl', function (Blueprint $table) {
            $table->id();
            $table->string('cust_business_name')->nullable();
            $table->string('cust_business_country')->nullable();
            $table->bigInteger('cust_business_telephone')->nullable();
            $table->longText('cust_business_website')->nullable();
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
        Schema::dropIfExists('cust_rec__tbl');
    }
}
