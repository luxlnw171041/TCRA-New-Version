<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->nullable();
            $table->string('compname')->nullable();
            $table->string('commercial_registration')->nullable();
            $table->string('d_name')->nullable();
            $table->string('d_surname')->nullable();
            $table->string('d_idno')->nullable();
            $table->string('demerit')->nullable();
            $table->string('demeritdetail')->nullable();
            $table->string('d_pic_id_card')->nullable();
            $table->string('d_pic_lease')->nullable();
            $table->string('d_pic_cap')->nullable();
            $table->string('d_pic_other')->nullable();
            $table->string('d_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drivers');
    }
}
