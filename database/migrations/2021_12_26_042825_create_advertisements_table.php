<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('feature_image');
            $table->string('first_image');
            $table->string('second_image');
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('childcategory_id')->nullable();
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->string('price_status');
            $table->string('product_condition');
            $table->string('listing_location')->nullable();
            $table->integer('region_id');
            $table->integer('province_id')->nullable();
            $table->integer('city_id')->nullable();            
            $table->integer('barangay_id')->nullable();
            $table->string('phone_number');
            $table->integer('published')->default(1)->comment('1=pending,0=published');
            $table->string('link')->nullable();
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
        Schema::dropIfExists('advertisements');
    }
}
