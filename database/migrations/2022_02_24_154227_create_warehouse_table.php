<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('active')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('product_storages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('product_oppenings')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('warehouse_id')->constrained();
            $table->integer('quantity');
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
        Schema::dropIfExists('warehouse');
        Schema::dropIfExists('product_storages');
    }
}
