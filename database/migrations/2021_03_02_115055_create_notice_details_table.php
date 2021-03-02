<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_details', function (Blueprint $table) {
            $table->increments('notice_id');
            $table->string('title');
            $table->longText('description');
            $table->string('date');
            
            

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
        //Schema::dropIfExists('notice_details');
        Schema::create('notice_details', function (Blueprint $table) {
            $table->dropSoftDeletes();

        });
    }
}
