<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->string('product_name');
            $table->string('product_slug')->nullable();
            $table->string('product_sku')->nullable();
            $table->string('product_model')->nullable();
            $table->string('product_unit')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('best_price')->nullable();
            $table->string('discount')->nullable();
            $table->enum('discount_type', ['flat', 'percent'])->default('percent');
            $table->string('stock_quantity')->nullable();
            $table->text('description')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->integer('today_deal')->default(0);
            $table->integer('status')->default(1);

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('subcategory_id')
                ->references('id')->on('sub_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');


            $table->foreign('brand_id')
                ->references('id')->on('brands')
                ->onUpdate('cascade')
                ->onDelete('cascade');


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
        Schema::dropIfExists('products');
    }
};
