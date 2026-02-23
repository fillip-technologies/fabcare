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
        Schema::table('weight_bill_details', function (Blueprint $table) {
            $table->decimal('gst_percent', 5, 2)->default(0)->after('discount');
            $table->decimal('gst_amount', 10, 2)->default(0)->after('gst_percent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weight_bill_details', function (Blueprint $table) {
            //
        });
    }
};
