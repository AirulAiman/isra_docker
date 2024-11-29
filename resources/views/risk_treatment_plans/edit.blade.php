@extends('base.layout')

@section('content')
    <h1>Edit Risk Treatment Plan</h1>

    <form action="{{ route('risk_treatment_plans.update', $riskTreatmentPlan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="risk_id">Risk ID:</label>
            <input type="text" id="risk_id" name="risk_id" value="{{ $riskTreatmentPlan->risk_id }}" readonly>
        </div>

        <div>
            <label for="risk_level">Risk Level:</label>
            <input type="text" id="risk_level" name="risk_level" value="{{ $riskTreatmentPlan->risk_level }}" readonly>
        </div>

        <div>
            <label for="risk_owner">Risk Owner:</label>
            <input type="text" id="risk_owner" name="risk_owner" value="{{ $riskTreatmentPlan->risk_owner }}">
        </div>

        <div>
            <label for="treatment_option">Treatment Option:</label>
            <select id="treatment_option" name="treatment_option">
                <option value="Accept" {{ $riskTreatmentPlan->treatment_option == 'Accept' ? 'selected' : '' }}>Accept</option>
                <option value="Reduce" {{ $riskTreatmentPlan->treatment_option == 'Reduce' ? 'selected' : '' }}>Reduce</option>
                <option value="Transfer" {{ $riskTreatmentPlan->treatment_option == 'Transfer' ? 'selected' : '' }}>Transfer</option>
                <option value="Avoid" {{ $riskTreatmentPlan->treatment_option == 'Avoid' ? 'selected' : '' }}>Avoid</option>
            </select>
        </div>

        <div>
            <label for="planned_safeguard">Planned Safeguard:</label>
            <textarea id="planned_safeguard" name="planned_safeguard">{{ $riskTreatmentPlan->planned_safeguard }}</textarea>
        </div>

        <div>
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" value="{{ $riskTreatmentPlan->start_date }}">
        </div>

        <div>
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" value="{{ $riskTreatmentPlan->end_date }}">
        </div>

        <div>
            <label for="residual_risk">Residual Risk:</label>
            <select id="residual_risk" name="residual_risk">
                <option value="Low" {{ $riskTreatmentPlan->residual_risk == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $riskTreatmentPlan->residual_risk == 'Medium' ? 'selected' : '' }}>Medium</option>
            </select>
        </div>

        <div>
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="In Progress" {{ $riskTreatmentPlan->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ $riskTreatmentPlan->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
