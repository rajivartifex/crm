<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactInfoRecTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_info_rec__tbl', function (Blueprint $table) {
            $table->id();
            $table->string('con_first_name')->nullable();
            $table->string('con_last_name')->nullable();
            $table->string('con_email')->nullable();
            $table->bigInteger('con_telephone')->nullable();
            $table->string('con_fax')->nullable();
            $table->date('con_date')->nullable();
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
        Schema::dropIfExists('contact_info_rec__tbl');
    }
}
