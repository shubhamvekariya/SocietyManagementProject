<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocietiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('societies', function (Blueprint $table) {
            $table->id();
            $table->string('society_name');
            $table->longText('address')->nullable($value = true);
            $table->string('country');
            $table->string('state')->nullable($value = true);
            $table->string('city')->nullable($value = true);
            $table->string('secretary_name');
            $table->string('email')->unique();
            $table->bigInteger('phoneno');
            $table->string('password');

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
        //Schema::dropIfExists('societies');
        Schema::create('societies', function (Blueprint $table) {
            $table->dropSoftDeletes();

        });
    }
}
