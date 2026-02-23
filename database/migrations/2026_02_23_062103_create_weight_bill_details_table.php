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
        Schema::create('weight_bill_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('weight_range_id')->constrained('weight_ranges')->onDelete('cascade');
            $table->foreignId('laundry_type_id')->constrained('laundry_types')->onDelete('cascade');
            $table->string('weight');
            $table->string('rate');
            $table->string('total');
            $table->string('paid');
            $table->string('discount');
            $table->string('due');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weight_bill_details');
    }
};
