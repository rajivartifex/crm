<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailToCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cust_rec__tbl', function (Blueprint $table) {
            $table->string('cust_business_email')->after('cust_business_telephone')->null();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cust_rec__tbl', function (Blueprint $table) {
            $table->dropColumn('cust_business_email');
        });
    }
}
