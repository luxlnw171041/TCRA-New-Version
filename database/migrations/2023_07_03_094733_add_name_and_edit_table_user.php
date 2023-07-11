<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameAndEditTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('member_name')->nullable();
            $table->string('member_co')->nullable();
            $table->string('member_addr')->nullable();
            $table->string('member_tel')->nullable();
            $table->string('member_status')->nullable();
            $table->string('member_count')->nullable();
            $table->string('member_role')->nullable();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
