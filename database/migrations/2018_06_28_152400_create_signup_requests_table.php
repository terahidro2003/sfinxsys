<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignupRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signup_requests', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('phone_number');
            $table->string('parents_phone_number')->default(null);
            $table->string('facebook');
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
        Schema::dropIfExists('signup_requests');
    }
}
