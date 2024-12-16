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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('document_name');
            $table->string('service_type');
            $table->string('file');
            $table->integer('quantity');
            $table->text('comments')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->enum('status', ['Pending', 'Waiting for Approval','Approved', 'Declined'])->default('Pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
