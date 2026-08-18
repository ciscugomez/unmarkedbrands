<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('redirections', function (Blueprint $table) {
            $table->id();
            $table->string('from', 500);
            $table->string('to', 500);
            $table->date('redirected_at')->nullable();
            $table->tinyInteger('is_permanent')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
            $table->index(['from', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redirections');
    }
};
