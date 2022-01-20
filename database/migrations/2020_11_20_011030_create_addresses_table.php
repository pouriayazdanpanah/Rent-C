<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('formatted_address',255);
            $table->string('route_name')->nullable();
            $table->string('neighbourhood')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('municipality_zone')->nullable();
            $table->string('place')->nullable();
            $table->decimal('lat' , 10,8);
            $table->decimal('lng' , 11, 8);
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
        Schema::dropIfExists('addresses');
    }
}
