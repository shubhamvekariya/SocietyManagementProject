<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_details', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_no');
            $table->string('category')->nullable();
            $table->string('complaint_title');
            $table->string('reg_date')->nullable();
            $table->string('status');
            $table->longText('remarks')->nullable();

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
        //Schema::dropIfExists('complaint_details');
        Schema::create('complaint_details', function (Blueprint $table) {
            $table->dropSoftDeletes();

        });
    }
}
