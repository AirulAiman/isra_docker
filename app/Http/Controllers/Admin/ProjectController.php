<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Organization;

class ProjectController extends Controller
{
    // ====================================
    // READ
    // ====================================
    public function view()
    {
        $projects = Project::all();
        $orgs = Organization::all();
        return view('admin.projects.main', compact('projects', 'orgs'));
    }

    // ====================================
    // CREATE
    // ====================================
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'prj_name' => 'required|string',
            'prj_desc' => 'required|string'
        ]);

        Project::create([
            'prj_id' => mt_rand(100000, 900000),
            'prj_name' => $validatedData['prj_name'],
            'prj_desc' => $validatedData['prj_desc'],
            'created_at' => now(),
            'updated_at' => now(),
            'start_date' => now(),
            'end_date' => '',
            'organization' => 'unassigned'
        ]);

        return redirect(route('admin.projects'));
    }

    // ====================================
    // UPDATE
    // ====================================
    public function update(Request $request, $prj_id)
    {
        $project = Project::where('prj_id', $prj_id)->first();
        if (!$project) {
            return redirect()->back()->withErrors(['error' => 'Project not found']);
        }

        try {
            $validatedData = $request->validate([
                'prj_name' => 'nullable|string',
                'prj_desc' => 'nullable|string',
                'organization' => 'nullable|integer'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

        try {
            if (isset($validatedData['prj_name'])) {
                $project->prj_name = $validatedData['prj_name'];
            }
            if (isset($validatedData['prj_desc'])) {
                $project->prj_desc = $validatedData['prj_desc'];
            }
            if (isset($validatedData['organization'])) {
                $project->organization = $validatedData['organization'];
            }
            $project->updated_at = now();
            $project->save();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json(['message' => 'Project updated successfully'], 200);
    }
}
