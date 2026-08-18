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
        Schema::table('publications', function (Blueprint $table) {
            // brand_created_at field timestamp to month and date
            $table->dropColumn('brand_created_at');
            $table->year('brand_created_at_year')->nullable();
            $table->unsignedInteger('brand_created_at_month')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('publications', function (Blueprint $table) {
            // brand_created_at field timestamp to month and date
            $table->dropColumn('brand_created_at_year');
            $table->dropColumn('brand_created_at_month');
            $table->timestamp('brand_created_at')->nullable();
        });
    }
};
