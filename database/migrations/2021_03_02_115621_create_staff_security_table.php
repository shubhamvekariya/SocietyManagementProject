<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffSecurityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_security', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->string('work');
            
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
        //Schema::dropIfExists('staff_security');
        Schema::create('staff_security', function (Blueprint $table) {
            $table->dropSoftDeletes();

        });
    }
}
