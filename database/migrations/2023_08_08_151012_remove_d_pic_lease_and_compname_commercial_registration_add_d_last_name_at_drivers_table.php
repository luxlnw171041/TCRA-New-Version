<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveDPicLeaseAndCompnameCommercialRegistrationAddDLastNameAtDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drivers', function (Blueprint $table) {
            $table->string('d_pic_indictment')->nullable();//คำฟ้อง

            $table->dropColumn('compname');
            $table->dropColumn('commercial_registration');
            $table->dropColumn('d_pic_lease');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drivers', function (Blueprint $table) {
            //
        });
    }
}
