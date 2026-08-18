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
        Schema::create('publications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('brand')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('image_before')->nullable();
            $table->string('image_after')->nullable();
            $table->uuid('category_id')->nullable();
            $table->string('agency')->nullable();
            $table->json('content');
            $table->timestamp('brand_created_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
