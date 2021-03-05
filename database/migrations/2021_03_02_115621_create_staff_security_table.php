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
            $table->string('work')->nullable();
            $table->string('email')->unique();
            $table->integer('age');
            $table->bigInteger('phoneno')->nullable();
            $table->string('gender')->nullable();
            $table->string('password');
            $table->foreignId('society_id')->nullable()->constrained('societies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
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
