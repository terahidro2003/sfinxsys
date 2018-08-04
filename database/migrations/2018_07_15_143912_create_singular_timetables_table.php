<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSingularTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('singular_timetables', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->integer('group_id');
            $table->string('group_name');
            $table->date('date'); //shows the actual date of the training
            $table->string('week_day');
            $table->time('time_from');
            $table->time('time_to');
            $table->boolean('CurrentlyActive')->default('0');
            $table->boolean('IsCompleted')->default('0'); //shows if the training was (after its time) or will be (before its time)
            $table->integer('entered')->default('0'); //stores how many people was in the current training by RFID or BackupIndentify data
            $table->timestamps();
         }); //whereBetween('created_at', [$current_month_begin, $current_month_end])
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('singular_timetables');
    }
}
