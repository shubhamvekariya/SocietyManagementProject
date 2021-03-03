<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            
            $table->id();
            $table->string('date_of_booking');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('assets');
            $table->longText('func_details')->nullable();
            $table->string('charges')->nullable();

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
        //Schema::dropIfExists('assets');

        Schema::create('assets', function (Blueprint $table) {
            $table->dropSoftDeletes();

        });
    }
}
