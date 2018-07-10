<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheAppointments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('the_appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient_id',16);
            $table->foreign('patient_id')->references('number')->on('the_patient');
            $table->enum('a_status', ['Confirmed', 'To Confirm' , 'Cancelled-patient treated','Closed-visit skipped','Cancelled']);
            $table->string('a_clinic');
            $table->date('a_date');
            $table->time('a_start_time');
            $table->time('a_end_time');
            $table->float('a_cost');
            $table->text('a_comments')->nullable();
        });
    //     Schema::table('the_appointments', function($table) {
    //        $table->foreign('patient_id')->references('number')->on('the_patient');
    //    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('the_appointments');
    }
}
