<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('tracking_id')->unique();
            $table->string('reciever_name');
            $table->string('parcel_image');
            $table->string('reciever_phonenumber');
            $table->text('reciever_address');
            $table->string('shipment_fee');
            $table->string('current_location');
            $table->string('sender_name');
            $table->string('sender_location');
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
        Schema::dropIfExists('parcels');
    }
}
