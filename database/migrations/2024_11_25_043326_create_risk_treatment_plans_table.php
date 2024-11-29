<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('risk_treatment_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('risk_id')->nullable()->constrained('risk_assessments')->onDelete('cascade');
            $table->string('risk_level');
            $table->string('risk_owner')->default('Unassigned');
            $table->enum('treatment_option', ['Accept', 'Reduce', 'Transfer', 'Avoid']);
            $table->string('residual_risk')->default('Medium');
            $table->enum('status', ['In Progress', 'Completed'])->default('In Progress');
            $table->text('planned_safeguard')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
    Schema::table('risk_treatment_plans', function (Blueprint $table) {
                $table->dropForeign(['risk_id']);
                 $table->dropColumn('risk_id');
    }
};
