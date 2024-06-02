<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RolesAdmin;
use App\Models\SousAdmin;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_role' => 'required|unique:roles|max:255',
        ]);

        Role::create([
            'nom_role' => $request->nom_role,
        ]);

        return redirect()->route('roles.create')
            ->with('success', 'Role created successfully.');
    }

    public function showAssignRolesForm()
    {
        $sousAdmins = SousAdmin::with(['rolesAdmins' => function($query) {
            $query->select('role_id');
        }])->get();
        $roles = Role::all();
        $adminRoles = RolesAdmin::all();
        return view('assign-roles', compact('sousAdmins', 'roles','adminRoles'));
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
    // app/Http/Controllers/RoleController.php

public function assignRoles(Request $request)
{
    // Validate the request data
    $request->validate([
        'admin' => 'required|exists:sous_admins,id',
        'roles' => 'required|array',
        'roles.*' => 'exists:roles,nom_role'
    ]);

    // Retrieve the selected admin ID
    $adminId = $request->input('admin');

    // Retrieve the selected roles
    $roles = $request->input('roles');

    // Remove all previous role assignments for the selected admin
    RolesAdmin::where('id_sous_admin', $adminId)->delete();

    // Loop through the roles and insert them into the roles_admins table
    foreach ($roles as $role) {
        $roleId = Role::where('nom_role', $role)->first()->id;

        RolesAdmin::create([
            'role_id' => $roleId,
            'id_sous_admin' => $adminId
        ]);
    }

    return redirect()->route('assign.roles.form', ['admin' => $adminId])->with('success', 'Roles assigned successfully.');
}

}
