@extends('base.layout')

@section('content')
    @include('navbar.layout')
    <h1>Risk Treatment Plans</h1>

    <a href="{{ route('risk_treatment_plans.create') }}" class="btn btn-primary">Create New Risk Treatment Plan</a>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Risk ID</th>
                <th>Risk Level</th>
                <th>Risk Owner</th>
                <th>Treatment Option</th>
                <th>Residual Risk</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riskTreatmentPlans as $plan)
                <tr>
                    <td>{{ $plan->risk_id }}</td>
                    <td>{{ $plan->risk_level }}</td>
                    <td>{{ $plan->risk_owner }}</td>
                    <td>{{ $plan->treatment_option }}</td>
                    <td>{{ $plan->residual_risk }}</td>
                    <td>{{ $plan->status }}</td>
                    <td>
                        {{-- <a href="{{ route('risk-treatment-plans.export-pdf', $plan->id) }}" class="btn btn-sm btn-primary">Export PDF</a> --}}
                        <a href="{{ route('risk_treatment_plans.show', $plan->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('risk_treatment_plans.edit', $plan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('risk_treatment_plans.destroy', $plan->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
