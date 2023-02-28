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
        Schema::table('fights', function (Blueprint $table) {
            $table->integer('order')->nullable()->default(0)->after('session_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fights', function (Blueprint $table) {
            Schema::table('fights', function (Blueprint $table) {
                $table->dropColumn('order');
            });
        });
    }
};
