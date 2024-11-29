<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskTreatmentPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'risk_id',
    'risk_level',
    'risk_owner',
    'treatment_option',
    'residual_risk',
    'status',
    'planned_safeguard',
    'start_date',
    'end_date',
    ];

    public function riskAssessment()
    {
        return $this->belongsTo(RiskAssessment::class, 'risk_id');
    }
}