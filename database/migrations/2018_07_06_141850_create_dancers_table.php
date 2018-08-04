<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dancers', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('phone_number');
            $table->string('parents_phone_number')->default(null);
            $table->string('facebook');
            $table->string('dance_group');
            $table->string('rfid_id')->default('00 00 00 00');
            $table->integer('discount');
            $table->integer('credit');
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
        Schema::dropIfExists('dancers');
    }
}
