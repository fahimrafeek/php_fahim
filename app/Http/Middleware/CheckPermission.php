<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use App\Services\PermissionService;
use Config;

class CheckPermission
{

    protected $user_service;
    protected $permission_service;

    public function __construct(UserService $user_service, PermissionService $permission_service)
    {
      $this->user_service = $user_service;
      $this->permission_service = $permission_service;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user_id = Auth::user()->id;
        $user_details = $this->user_service->getUser($user_id);
        if($user_details->role_id == 1) {
            return $next($request);
        }

        $currentAction = request()->route()->getActionName();
        list($controller, $method) = explode('@', $currentAction);

        $section_permissions = Config::get('permission.section_permissions');
        if(isset($section_permissions[$controller])) {
            $permission = $section_permissions[$controller];
            $section_id = $permission['section'];
            $authenticated = $this->permission_service->check_section_permission($user_details->role_id, $section_id);

            if($authenticated) {
                return $next($request);
            }else {
                return redirect('/permisionDenied');
            }
        }else{
            return redirect('/permisionDenied');
        }
    }
}
