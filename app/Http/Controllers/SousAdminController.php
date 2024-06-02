<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\SousAdmin;

class SousAdminController extends Controller
{
    public function index()
    {
        $sousAdmins = SousAdmin::all();
        return view('sous_admins.index', compact('sousAdmins'));
    }

    public function create()
    {
        $sousAdmins = SousAdmin::all();
        return view('sous_admins.create',compact('sousAdmins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cin' => 'required|unique:sous_admins',
            'matricule' => 'required|unique:sous_admins',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:sous_admins',
            'password' => 'required',
        ]);

        SousAdmin::create($request->all());

        return redirect()->route('admins.index')
            ->with('success', 'Sous admin created successfully.');
    }

    public function show($id)
    {
        $sousAdmins = SousAdmin::all();
        $roles = Role::all();
        return view('assign-roles', compact('sousAdmins','roles'));
    }

    public function edit($id)
    {
        $sousAdmin = SousAdmin::findOrFail($id);
        return view('sous_admins.edit', compact('sousAdmin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cin' => 'required',
            'matricule' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $sousAdmin = SousAdmin::findOrFail($id);
        $sousAdmin->update($request->all());
        
        return redirect()->route('admins.index')
            ->with('success', 'Sous admin updated successfully.');
    }

    public function destroy($id)
    {
        $sousAdmin = SousAdmin::findOrFail($id);
        $sousAdmin->delete();

        return redirect()->route('admins.index')
            ->with('success', 'Sous admin deleted successfully.');
    }


    public function assignRoles(Request $request, $id)
    {
        $admin = SousAdmin::find($request->admin);
        $admin->roles()->sync($request->roles);

        return redirect()->back()->with('success', 'Roles assigned successfully.');
    }
}
