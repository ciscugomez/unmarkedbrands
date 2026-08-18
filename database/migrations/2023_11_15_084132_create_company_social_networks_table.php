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
        Schema::create('company_social_networks', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('account_id')->constrained('accounts')->onDelete('cascade');
            $table->foreignUuid('social_network_id')->constrained('social_networks')->onDelete('cascade');
            $table->string('url')->nullable();
            $table->string('nickname')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_social_networks');
    }
};
