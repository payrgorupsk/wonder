<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ro_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_sku');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->text('product_description');
            $table->integer('product_stock');
            $table->integer('payrmall');
            $table->integer('flash_sale');
            $table->integer('all_products');
            $table->text('buy_return_policy');
            $table->text('product_image');
            $table->text('product_delevery');
            $table->text('country');
            $table->text('payment_getway');
            $table->integer('cod');
            $table->integer('affiliate');
            $table->integer('status');
            $table->integer('store_id');
            $table->integer('added_by');
            $table->integer('approved_by');
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
        Schema::dropIfExists('ro_products');
    }
}
