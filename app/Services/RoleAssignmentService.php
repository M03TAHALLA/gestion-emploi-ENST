<?php

namespace App\Services;

use App\Models\Role;
use App\Models\SousAdmin;

class RoleAssignmentService
{
    public function assignRoleToSousAdmin($roleId, $sousAdminId)
    {
        // Find the role by its ID
        $role = Role::find($roleId);

        // Find the sub-administrator by ID
        $sousAdmin = SousAdmin::find($sousAdminId);

        // If both the role and the sub-administrator exist
        if ($role && $sousAdmin) {
            // Attach the role to the sub-administrator
            $sousAdmin->roles()->attach($role->id);

            return true; // Role assignment successful
        }

        return false; // Role assignment failed
    }
}
