<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_details', function (Blueprint $table) {
            $table->increments('meet_id');
            $table->string('title');
            $table->string('date');
            $table->string('start_time');
            $table->string('end_time');
            $table->longText('place');

            $table->foreignId('society_id')->constrained('societies')->onUpdate('cascade')->onDelete('cascade');
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
        //Schema::dropIfExists('meeting_details');
        Schema::create('meeting_details', function (Blueprint $table) {
            $table->dropSoftDeletes();

        });
    }
}
