<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title','52');
            $table->string('slug','57');
            $table->string('categories');
            $table->string('price')->nullable();
            $table->string('price_label')->nullable();
            $table->text('description');
            $table->integer('number_of_bed');
            $table->integer('number_of_room');
            $table->integer('number_of_bathroom');
            $table->integer('number_of_guest');
            $table->string('sqft');
            $table->integer('inventory')->default(0);
            $table->integer('view_count')->default(0);
            $table->json('features')->nullable();
            $table->integer('image_cover')->nullable();
            $table->timestamps();
        });

        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('count_of_used')->default(0);
            $table->timestamps();
        });

        Schema::create('feature_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('feature_id');
            $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade');
            $table->primary(['product_id' , 'feature_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_product');
        Schema::dropIfExists('features');
        Schema::dropIfExists('products');
    }
}
