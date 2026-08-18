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

        Schema::table('accounts', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('type')->nullable();
            $table->longText('description')->nullable();
            $table->string('webpage')->nullable();
            $table->string('nickname')->unique();
            $table->string('avatar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('description');
            $table->dropColumn('webpage');
            $table->dropColumn('nickname');
            $table->dropColumn('avatar');
        });
    }
};
