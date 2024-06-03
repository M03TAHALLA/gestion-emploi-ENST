<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\SousAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $sousAdmin = new SousAdmin([
            'cin' => $request->get('cin'),
            'nom' => $request->get('nom'),
            'matricule' => $request->get('matricule'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $sousAdmin->save();

        return redirect()->route('admins.index')
            ->with('success', 'Sous admin created successfully.');
    }

    public function show($id)
    {
        $sousAdmins = SousAdmin::where('id', $id)->get(); // Use get() to retrieve the SousAdmin objects

        $countSousAdmin = $sousAdmins->count();
        $roles = Role::all();
        return view('assign-roles', [
            'sousAdmins'=> $sousAdmins,
            'id'=>$id,
            'roles'=>$roles,
            'countSousAdmin'=>$countSousAdmin
        ]);
    
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
