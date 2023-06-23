<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustLocationRecTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cust_location_rec__tbl', function (Blueprint $table) {
            $table->id();
            $table->integer('cust_id')->nullable();
            $table->string('cust_location_name')->nullable();
            $table->string('cust_location_add1')->nullable();
            $table->string('cust_location_add2')->nullable();
            $table->string('cust_location_suburb')->nullable();
            $table->string('cust_location_state')->nullable();
            $table->string('cust_location_postcode')->nullable();
            $table->string('cust_location_country')->nullable();
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
        Schema::dropIfExists('cust_location_rec__tbl');
    }
}
