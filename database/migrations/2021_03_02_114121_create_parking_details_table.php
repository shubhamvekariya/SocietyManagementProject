<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('vehicle_no');
            $table->string('entry_time');
            $table->string('exit_time')->nullable();
            $table->string('entry_date');
            $table->string('exit_date')->nullable();
            

            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();

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
        //Schema::dropIfExists('parking_details');
        Schema::create('parking_details', function (Blueprint $table) {
            $table->dropSoftDeletes();

        });
    }
}
