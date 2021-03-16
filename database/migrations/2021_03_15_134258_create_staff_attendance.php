<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffAttendance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_attendance', function (Blueprint $table) {
            $table->id();
            $table->timestamp('entry_time')->useCurrent();
            $table->timestamp('exit_time')->nullable();
            $table->foreignId('staff_id')->nullable()->constrained('staff_security')->onUpdate('cascade')->onDelete('cascade');
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
        // Schema::dropIfExists('staff_attendance');
        Schema::create('staff_attendance', function (Blueprint $table) {
            $table->dropSoftDeletes();

        });
    }
}
