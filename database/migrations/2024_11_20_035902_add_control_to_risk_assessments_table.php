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
        Schema::table('risk_assessments', function (Blueprint $table) {
            $table->foreignId('control_group_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('existing_control_id')->nullable()->constrained('existing_controls')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('risk_assessments', function (Blueprint $table) {
            $table->dropForeign(['control_group_id']);
            $table->dropForeign(['existing_control_id']);
            $table->dropColumn(['control_group_id', 'existing_control_id']);
        });
    }
};
