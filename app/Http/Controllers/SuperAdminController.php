<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\SousAdmin;
use App\Models\SuperAdmin;
use App\Services\RoleAssignmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $superAdmins = SuperAdmin::all();
        return view('super_admins.index', compact('superAdmins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('super_admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cin' => 'required|unique:super_admins',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:super_admins',
            'password' => 'required|min:8',
            'annee_academique' => 'required',
        ]);

        $superAdmin = new SuperAdmin([
            'cin' => $request->get('cin'),
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'annee_academique' => $request->get('annee_academique'),
        ]);

        $superAdmin->save();

        return redirect()->route('super_admins.index')->with('success', 'SuperAdmin created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function showAssignRolesForm()
    {
        $roles = \App\Models\Role::all();
        $admins = \App\Models\SousAdmin::all();
        return view('assign-roles', compact('roles', 'admins'));
    }

    public function assignRoles(Request $request)
{
    $adminId = $request->input('admin');
    $roleId = $request->input('role');

    $roleAssignmentService = new RoleAssignmentService();
    $result = $roleAssignmentService->assignRoleToSousAdmin($roleId, $adminId);

    if ($result) {
        return redirect()->back()->with('success', 'Role assigned successfully');
    } else {
        return redirect()->back()->with('error', 'Failed to assign role');
    }
}

}
