<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustDescRecTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cust_desc_rec__tbl', function (Blueprint $table) {
            $table->id();
            $table->integer('cust_id')->nullable();
            $table->longText('cust_short_desc')->nullable();
            $table->longText('cust_long_desc')->nullable();
            $table->longText('cust_alter_desc')->nullable();
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
        Schema::dropIfExists('cust_desc_rec__tbl');
    }
}
