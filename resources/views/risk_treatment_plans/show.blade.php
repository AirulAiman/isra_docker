@extends('base.layout')

@section('content')
    <h1>Risk Treatment Plan Details</h1>

    <div>
        <strong>Risk ID:</strong> {{ $riskTreatmentPlan->risk_id }}
    </div>
    <div>
        <strong>Risk Level:</strong> {{ $riskTreatmentPlan->risk_level }}
    </div>
    <div>
        <strong>Risk Owner:</strong> {{ $riskTreatmentPlan->risk_owner }}
    </div>
    <div>
        <strong>Treatment Option:</strong> {{ $riskTreatmentPlan->treatment_option }}
    </div>
    <div>
        <strong>Planned Safeguard:</strong> {{ $riskTreatmentPlan->planned_safeguard }}
    </div>
    <div>
        <strong>Start Date:</strong> {{ $riskTreatmentPlan->start_date }}
    </div>
    <div>
        <strong>End Date:</strong> {{ $riskTreatmentPlan->end_date }}
    </div>
    <div>
        <strong>Residual Risk:</strong> {{ $riskTreatmentPlan->residual_risk }}
    </div>
    <div>
        <strong>Status:</strong> {{ $riskTreatmentPlan->status }}
    </div>

    <a href="{{ route('risk_treatment_plans.edit', $riskTreatmentPlan->id) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('risk_treatment_plans.index') }}" class="btn btn-primary">Back to List</a>
@endsection
