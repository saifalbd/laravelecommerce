<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->bigInteger('amount');
            $table->foreignId('buyer_id')->constrained('users')->restrictOnDelete()
            ->restrictOnUpdate();
            $table->string('status')->default('pending');
            $table->json('address')->default(json_encode([]));
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->integer('rate');
            $table->foreignId('product_id')->constrained('products')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete()->onUpdate('restrict');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->bigInteger('amount');
            $table->foreignId('seller_id')->constrained('users')->restrictOnDelete()->restrictOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('purchase_products', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->integer('rate');
            $table->foreignId('purchase_id')->constrained('purchases')->cascadeOnDelete()->onUpdate('restrict');
            $table->foreignId('product_id')->constrained('products')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('storage_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_products');
        Schema::dropIfExists('purchases');
        Schema::dropIfExists('purchase_products');
    }
}
