<?php

namespace App\Services;

use App\Repositories\PermissionRepository;
use Illuminate\Support\Facades\Hash;

class PermissionService
{

    protected $permission_repository;

    public function __construct(PermissionRepository $permission_repository)
    {
        $this->permission_repository = $permission_repository;
    }

    public function getRoles()
    {
        $columns = ['id','role'];
        return $this->permission_repository->get($columns);
    }

    public function check_section_permission($role_id, $section_id){
        return $this->permission_repository->check_section_permission($role_id, $section_id);
    }
    
}

