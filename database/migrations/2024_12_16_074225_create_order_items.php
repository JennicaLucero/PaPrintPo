<?php
// Migration for creating the order_items table

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('supply_id');
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->timestamps();

            // Foreign keys
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('supply_id')->references('id')->on('printing_supplies')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
