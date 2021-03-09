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
            $table->string('name');
            $table->timestamp('start_time');
            $table->timestamp('end_time')->nullable();
            $table->string('assets');
            $table->longText('func_details')->nullable();
            $table->bigInteger('charges')->nullable();
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
