<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Appointments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
             $table->increments('id');
            $table->text('patient_id');
            $table->string('a_status');
            $table->string('a_clinic');
            $table->date('a_date');
            $table->time('a_start_time');
            $table->time('a_end_time');
            $table->integer('a_cost');
            $table->text('a_comments');
            
            
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');

    }
}
