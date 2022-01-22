<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\RolePermission;
use Exception;

class PermissionRepository
{
    protected $role;
    protected $role_permission;

    public function __construct(Role $role, RolePermission $role_permission)
    {
        $this->role = $role;
        $this->role_permission = $role_permission;
    }

    public function get($columns = ['*'])
    {
        return $this->role->orderBy('created_at','asc')->get($columns);
    }

    public function check_section_permission($role_id, $section_id) {
        try {
            return $this->role_permission
            ->where('role_id', $role_id)
            ->where('section_id', $section_id)
            ->first();
        }catch (Exception $exception) {
            return false;
        }
    }

}