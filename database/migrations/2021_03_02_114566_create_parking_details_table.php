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
            $table->string('vehicle_no');
            $table->string('type');
            $table->string('spot')->nullable();
            $table->foreignId('visitor_id')->constrained('visitors_details')->onUpdate('cascade')->onDelete('cascade');
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
