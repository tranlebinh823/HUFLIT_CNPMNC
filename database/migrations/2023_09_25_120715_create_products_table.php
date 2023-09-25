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
            $table->string('name');
            $table->string('slug');
            $table->text('thumb_image');
            $table->integer('qty');
            $table->text('short_description');
            $table->text('long_description');
            $table->text('video_link')->nullable();
            $table->string('sku')->nullable();
            $table->double('price');
            $table->double('offer_price')->nullable();
            $table->date('offer_start_date')->nullable();
            $table->date('offer_end_date')->nullable();
            
            $table->boolean('status');
            $table->integer('is_approved')->default(0);
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();

            //! sub_categories
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            //! child_categories
            $table->unsignedBigInteger('child_category_id')->nullable();
            $table->foreign('child_category_id')->references('id')->on('child_categories');
            //! vendors
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors');
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
