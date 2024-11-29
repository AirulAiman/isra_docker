<?php

namespace App\Http\Controllers;

use App\Models\RiskAssessment;
use App\Models\RiskTreatmentPlan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;



class RiskTreatmentPlanController extends Controller
{
    // Display a listing of the risk treatment plans
    public function index()
    {
        $riskTreatmentPlans = RiskTreatmentPlan::with('riskAssessment')->get(); // Retrieve all risk treatment plans
        return view('risk_treatment_plans.index', compact('riskTreatmentPlans')); // Pass the data to the view
    }

    // Show the form for creating a new risk treatment plan
    public function create()
    {
        $riskAssessments = RiskAssessment::all();
        return view('risk_treatment_plans.create', compact('riskAssessments'));
    }

    // Store a newly created risk treatment plan in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'risk_assessment_id' => 'required|exists:risk_assessments,id',
            'risk_level' => 'required|string',
            'risk_owner' => 'required|string|max:255',
            'treatment_option' => 'required|in:Accept,Reduce,Transfer,Avoid',
            'planned_safeguard' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'residual_risk' => 'required|in:Low,Medium',
            'status' => 'required|in:In Progress,Completed',
        ]);

        RiskTreatmentPlan::create($validated);

        return redirect()->route('risk_treatment_plans.index')->with('success', 'Risk Treatment Plan created successfully.');
    }

    // Show the details of a specific risk treatment plan
    public function show(RiskTreatmentPlan $riskTreatmentPlan)
    {
        return view('risk_treatment_plans.show', compact('riskTreatmentPlan'));
    }

    // Show the form for editing an existing risk treatment plan
    public function edit(RiskTreatmentPlan $riskTreatmentPlan)
    {
        $riskAssessments = RiskAssessment::all();
        return view('risk_treatment_plans.edit', compact('riskTreatmentPlan', 'riskAssessments'));
    }

    // Update the specified risk treatment plan in the database
    public function update(Request $request, RiskTreatmentPlan $riskTreatmentPlan)
    {
        $validated = $request->validate([
            'risk_assessment_id' => 'required|exists:risk_assessments,id',
            'risk_level' => 'required|string',
            'risk_owner' => 'required|string|max:255',
            'treatment_option' => 'required|in:Accept,Reduce,Transfer,Avoid',
            'planned_safeguard' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'residual_risk' => 'required|in:Low,Medium',
            'status' => 'required|in:In Progress,Completed',
        ]);

        $riskTreatmentPlan->update($validated);

        return redirect()->route('risk_treatment_plans.index')->with('success', 'Risk Treatment Plan updated successfully.');
    }

    public function exportPdf($id)
{
    $riskTreatmentPlan = RiskTreatmentPlan::findOrFail($id);

    // Share data with the view
    $data = [
        'riskTreatmentPlan' => $riskTreatmentPlan,
    ];

    // Load the view and pass the data
    $pdf = Pdf::loadView('risk_treatment_plans.pdf', $data);

    // Return the PDF for download
    return $pdf->download('Risk_Treatment_Plan_' . $riskTreatmentPlan->id . '.pdf');
}

public function exportAllPdf()
{
    $riskTreatmentPlans = RiskTreatmentPlan::all();

    // Share data with the view
    $data = [
        'riskTreatmentPlans' => $riskTreatmentPlans,
    ];

    // Load the view and pass the data
    $pdf = Pdf::loadView('risk_treatment_plans.bulk_pdf', $data);

    // Return the PDF for download
    return $pdf->download('Risk_Treatment_Plans.pdf');
}

    // Remove the specified risk treatment plan from the database
    public function destroy(RiskTreatmentPlan $riskTreatmentPlan)
    {
        $riskTreatmentPlan->delete();
        return redirect()->route('risk_treatment_plans.index')->with('success', 'Risk Treatment Plan deleted successfully.');
    }
}
