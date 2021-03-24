<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->float('sum');
            $table->integer('count');
            $table->string('due_date');

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
        //Schema::dropIfExists('bills');
        Schema::create('bills', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
