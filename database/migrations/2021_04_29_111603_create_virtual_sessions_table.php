<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_sessions', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->foreignId('society_id')->constrained('societies')->onUpdate('cascade')->onDelete('cascade');;
            $table->string("session_id");
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
        Schema::dropIfExists('virtual_sessions');
    }
}
