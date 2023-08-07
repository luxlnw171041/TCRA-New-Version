<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCPicCompanyCertificateAndCPicIndictmentToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('c_pic_company_certificate')->nullable();    //หนังสือรับรองบริษัท        
            $table->string('c_pic_indictment')->nullable();//คำฟ้อง
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
           //
        });
    }
}
