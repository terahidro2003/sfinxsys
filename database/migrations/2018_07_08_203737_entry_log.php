<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EntryLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EntryLog', function (Blueprint $table) {
        $table->increments('id')->autoIncrement();
        $table->integer('dancer_id');
        $table->string('group');
        $table->timestamps();
        //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('EntryLog');
        //
    }
}
