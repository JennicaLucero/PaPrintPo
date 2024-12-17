<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('file_checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->string('name');
            $table->string('address');
            $table->string('mobile_number');
            $table->string('delivery_type'); // e.g., "pick-up", "delivery"
            $table->string('payment_type');  // e.g., "cash", "gcash"
            $table->decimal('price', 10, 2);
            $table->string('order_status')->default('Pending'); // e.g., "pending", "completed"
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_checkouts');
    }
};
