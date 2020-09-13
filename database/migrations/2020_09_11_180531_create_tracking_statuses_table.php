<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_statuses', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('airway_bill_id');
			$table->string('status');
			$table->string('location');
			$table->timestamp('date');
			$table->timestamps();
			
			$table->foreign('airway_bill_id')->references('id')->on('airway_bills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracking_statuses');
    }
}
