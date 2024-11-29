<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\UserProject;
use Illuminate\Support\Facades\Log;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $orgs = Organization::all();
        $prjs = Project::all();
        $ups = UserProject::all();
        $search = htmlspecialchars($request->input('search'), ENT_QUOTES, 'UTF-8');

        if ((empty($search)) || ($search === null) || ($search === "")) {
            $users = [];
            return view('admin.user-management.index', compact('users', 'orgs', 'ups'));
        } else {
            $users = User::query()
                ->when(
                    $search,
                    function ($query, $search) {
                        return $query
                            ->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    }
                )
                ->get();

            return view('admin.user-management.index', compact('users', 'orgs', 'prjs', 'ups'));
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'nullable|email',
            'user_mgmt_org' => 'nullable|exists:organizations,org_id',
        ]);

        $data = [];

        if ($request->filled('email')) {
            $data['email'] = $request->input('email');
        }

        if ($request->filled('user_mgmt_org')) {
            $data['organization'] = $request->input('user_mgmt_org');
        }

        if (!empty($data)) {
            DB::table('users')
                ->where('user_id', $id)
                ->update($data);
        }

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    public function assign(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'user' => 'required|exists:users,user_id',
                'project' => 'required|exists:projects,prj_id'
            ]);

            // Check if assignment already exists
            $exists = DB::table('user_project')
                ->where('user', $validated['user'])
                ->where('project', $validated['project'])
                ->exists();

            if ($exists) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User is already assigned to this project'
                ], 422);
            }

            // Create new assignment with only two columns
            DB::table('user_project')->insert([
                'user' => $validated['user'],
                'project' => $validated['project']
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'User assigned to project successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Project assignment error: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to assign user to project'
            ], 500);
        }
    }
}
