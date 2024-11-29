<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiskAssessmentsTable extends Migration
{
    public function up()
    {
        Schema::create('risk_assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_id');
            $table->unsignedBigInteger('threat_group_id')->nullable();
            $table->unsignedBigInteger('threat_id')->nullable();
            $table->unsignedBigInteger('vulnerability_group_id')->nullable();
            $table->unsignedBigInteger('vulnerability_id')->nullable();

            // CIA Triad scores
            $table->integer('confidentiality')->default(1);
            $table->integer('integrity')->default(1);
            $table->integer('availability')->default(1);

            // Scoring system fields
            $table->enum('business_loss', ['Low', 'Medium', 'High'])->default('Low');
            $table->integer('business_score')->default(1);
            $table->decimal('cia_impact_score', 8, 2)->default(0);
            $table->enum('impact_level', ['Low', 'Medium', 'High'])->default('Low');
            $table->enum('likelihood', ['Low', 'Medium', 'High'])->default('Low');
            $table->integer('likelihood_score')->default(1);
            $table->decimal('final_risk_score', 8, 2)->default(0);
            $table->enum('final_risk_level', ['Low', 'Medium', 'High'])->default('Low');

            // Other fields
            $table->string('personnel')->nullable();
            $table->string('risk_owner')->nullable();
            $table->text('mitigation_option')->nullable();
            $table->text('treatment')->nullable();
            $table->text('actions')->nullable();
            

            $table->timestamps();
            
            // Define foreign keys
            $table->foreign('asset_id')->references('id')->on('asset_register')->onDelete('cascade');
            $table->foreign('threat_group_id')->references('id')->on('threat_groups')->nullOnDelete();
            $table->foreign('threat_id')->references('id')->on('threats')->nullOnDelete();
            $table->foreign('vulnerability_group_id')->references('id')->on('vulnerability_groups')->nullOnDelete();
            $table->foreign('vulnerability_id')->references('id')->on('vulnerabilities')->nullOnDelete();
            $table->foreignId('control_group_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('existing_control_id')->nullable()->constrained('existing_controls')->onDelete('set null');
        });
    }

    public function down()

    
          {
        Schema::table('risk_assessments', function (Blueprint $table) {
            $table->dropForeign(['control_group_id']);
            $table->dropForeign(['existing_control_id']);
            $table->dropColumn(['control_group_id', 'existing_control_id']);
        });
    }
    
}