<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_bill', function (Blueprint $table) {
            $table->increments('bill_id');
            $table->string('bill_date');
            $table->string('charges');
            $table->string('category');
            $table->string('due_dates');
            $table->longText('paid_status');

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
        //Schema::dropIfExists('maintenance_bill');

        Schema::create('family_members', function (Blueprint $table) {
            $table->dropSoftDeletes();

        });
    }
}
