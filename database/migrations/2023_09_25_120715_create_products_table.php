<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_title');
            $table->string('slug')->unique();
            $table->text('pro_description');
            $table->text('images');
            $table->text('images_gallery');
            $table->text('short_description');
            $table->integer('stock');


            $table->double('price');
            $table->double('offer_price')->nullable();
            $table->string('product_tag')->unique();

            $table->integer('status')->default(0);
            $table->integer('visibility')->default(0);
            $table->datetime('publish');
            //! sub_categories
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            //! categories
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            //! brands
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
