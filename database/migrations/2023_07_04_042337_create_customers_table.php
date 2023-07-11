<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->nullable();
            $table->string('rentname')->nullable();
            $table->string('compname')->nullable();
            $table->string('c_name')->nullable();
            $table->string('c_surname')->nullable();
            $table->string('c_idno')->nullable();
            $table->string('demerit')->nullable();
            $table->string('demeritdetail')->nullable();
            $table->string('c_pic_id_card')->nullable();
            $table->string('c_pic_lease')->nullable();
            $table->string('c_pic_execution')->nullable();
            $table->string('c_pic_cap')->nullable();
            $table->string('c_pic_other')->nullable();
            $table->string('c_date')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
