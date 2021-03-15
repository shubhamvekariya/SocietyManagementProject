<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors_details', function (Blueprint $table) {
            Schema::dropIfExists('parking_details');
            $table->id();
            $table->string('name');
            $table->bigInteger('phoneno');
            $table->longText('address')->nullable();
            $table->string('reason_to_meet')->nullable();
            $table->timestamps();
            $table->timestamp('entry_time')->useCurrent();
            $table->timestamp('exit_time')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('visitors_details');
        Schema::create('visitors_details', function (Blueprint $table) {
            $table->dropSoftDeletes();

        });
    }
}
