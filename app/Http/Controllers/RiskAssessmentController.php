<?php

namespace App\Http\Controllers;

use App\Models\ControlGroup;
use App\Models\RiskAssessment;
use App\Models\AssetRegister;
use App\Models\RiskTreatmentPlan;
use App\Models\ThreatGroup;
use App\Models\Threat;
use App\Models\VulnerabilityGroup;
use App\Models\Vulnerability;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class RiskAssessmentController extends Controller
{
    public function index(): View
    {
        $riskAssessments = RiskAssessment::with([
            'assetRegister',
            'threatGroup',
            'threat',
            'vulnerabilityGroup',
            'vulnerability',
            'controlGroup',
            'existingControl'
        ])->get();

        return view('risk_assessments.index', compact('riskAssessments'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'asset_id' => 'required|exists:asset_register,id',
            'threat_group_id' => 'nullable|exists:threat_groups,id',
            'threat_id' => 'nullable|exists:threats,id',
            'vulnerability_group_id' => 'nullable|exists:vulnerability_groups,id',
            'vulnerability_id' => 'nullable|exists:vulnerabilities,id',
            'confidentiality' => 'required|integer|min:1|max:3',
            'integrity' => 'required|integer|min:1|max:3',
            'availability' => 'required|integer|min:1|max:3',
            'personnel' => 'nullable|string|max:255',
            'business_loss' => 'required|in:Low,Medium,High',
            'likelihood' => 'required|in:Low,Medium,High',
            'control_group_id' => 'nullable|exists:control_groups,id', // Add for control group
            'existing_control_id' => 'nullable|exists:existing_controls,id', // Add for existing control
            'risk_owner' => 'nullable|string|max:255',
            'mitigation_option' => 'nullable|string',
            'treatment' => 'nullable|string',
            'actions' => 'nullable|string',
        ]);

        $riskAssessment = new RiskAssessment($request->all());
        $riskAssessment->calculateScores();
        $riskAssessment->save();
        $riskAssessment = RiskAssessment::create($validated);

        $this->calculateRisk($riskAssessment);

        if ($riskAssessment->final_risk_level === 'High') {
            RiskTreatmentPlan::create([
                'risk_assessment_id' => $riskAssessment->id,
                'risk_level' => $riskAssessment->final_risk_level,
                'risk_owner' => $riskAssessment->risk_owner,
                'treatment_option' => 'Reduce',  // Default treatment option for High risk
                'residual_risk' => 'Medium', // Residual risk for High risk
                'status' => 'In Progress',
            ]);
        }
    
        return redirect()->route('risk_assessments.index')
            ->with('success', 'Risk assessment and treatment plan created successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RiskAssessment  $risk_assessment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $riskAssessment = RiskAssessment::findOrFail($id);
        $assets = AssetRegister::all();
        $threatGroups = ThreatGroup::all();
        $threats = Threat::all(); 
        $vulnerabilityGroups = VulnerabilityGroup::all();
        $vulnerabilities = Vulnerability::all();
        $riskAssessment = RiskAssessment::with('controlGroup', 'existingControl')->findOrFail($id);
        $controlGroups = ControlGroup::with('controls')->get(); // Load Control Groups with Existing Controls

        return view('risk_assessments.edit', compact(
            'riskAssessment', 'assets', 'threatGroups', 'threats', 'vulnerabilityGroups', 'vulnerabilities', 'controlGroups'
        ));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RiskAssessment  $risk_assessment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $request->validate([
            'asset_id' => 'required|exists:asset_register,id',
            'threat_group_id' => 'nullable|exists:threat_groups,id',
            'threat_id' => 'nullable|exists:threats,id',
            'vulnerability_group_id' => 'nullable|exists:vulnerability_groups,id',
            'vulnerability_id' => 'nullable|exists:vulnerabilities,id',
            'confidentiality' => 'required|integer|min:1|max:3',
            'integrity' => 'required|integer|min:1|max:3',
            'availability' => 'required|integer|min:1|max:3',
            'personnel' => 'nullable|string|max:255',
            'business_loss' => 'required|in:Low,Medium,High',
            'likelihood' => 'required|in:Low,Medium,High',
            'risk_owner' => 'nullable|string|max:255',
            'mitigation_option' => 'nullable|string',
            'treatment' => 'nullable|string',
            'actions' => 'nullable|string',
            'control_group_id' => 'required|exists:control_groups,id',
            'existing_control_id' => 'required|exists:existing_controls,id',
        ]);

        $riskAssessment = RiskAssessment::findOrFail($id);
        $riskAssessment->fill($validated);
        $riskAssessment->calculateScores();
        $riskAssessment->save();
        $riskAssessment->update($validated);

        if (in_array($riskAssessment->risk_level, ['Medium', 'High'])) {
            $riskTreatmentPlan = $riskAssessment->riskTreatmentPlan;
            if (!$riskTreatmentPlan) {
                RiskTreatmentPlan::create([
                    'risk_id' => $riskAssessment->id,
                    'risk_level' => $riskAssessment->risk_level,
                ]);
            } else {
                $riskTreatmentPlan->update(['risk_level' => $riskAssessment->risk_level]);
            }
        }

    
     
        // Calculate CIA Score
        $confidentiality = $request->input('confidentiality');
        $integrity = $request->input('integrity');
        $availability = $request->input('availability');
        
        $totalScore = $confidentiality + $integrity + $availability;

        // Determine the CIA score description
        if ($totalScore <= 3) {
            $ciaScore = 'Low';
        } elseif ($totalScore <= 6) {
            $ciaScore = 'Medium';
        } else {
            $ciaScore = 'High';
        }

        // Update the risk assessment
        $riskAssessment->confidentiality = $confidentiality;
        $riskAssessment->integrity = $integrity;
        $riskAssessment->availability = $availability;
        $riskAssessment->cia_score = $ciaScore; // Save the calculated CIA score
        $riskAssessment->save();

        if ($riskAssessment->final_risk_level === 'High' && !$riskAssessment->treatmentPlan) {
            RiskTreatmentPlan::create([
                    'risk_id' => $riskAssessment->id,
                    'risk_level' => $riskAssessment->final_risk_level,
                    'risk_owner' => $riskAssessment->risk_owner ?? 'Unassigned',
                    'treatment_option' => 'Reduce', // default value
                    'residual_risk' => 'Medium', // default value
                    'status' => 'In Progress', // default value
                    'planned_safeguard' => null,
                    'start_date' => now(),
                    'end_date' => null,
            ]);
        }

        return redirect()->route('risk_assessments.index')
        ->with('success', 'Risk Assessment updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RiskAssessment  $risk_assessment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $riskAssessment = RiskAssessment::findOrFail($id);
        $riskAssessment->delete();
    
        return redirect()->route('risk_assessments.index')
            ->with('success', 'Risk assessment deleted successfully.');
    }
}