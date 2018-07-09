<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThePatient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('the_patient', function (Blueprint $table) {
            // $table->increments('id');
            // $table->text('P_number')->unique();
            $table->string('P_number',16)->unique();
            $table->string('P_name');
            $table->string('P_mobile',11);
            $table->char('P_gender',1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('the_patient');
    }
}
