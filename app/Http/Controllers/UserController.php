<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use Validator;
use Illuminate\Validation\Rule;
use App\Services\UserService;
use App\Services\PermissionService;

class UserController extends Controller
{
    protected $user_service;
    protected $permission_service;

    public function __construct(UserService $user_service, PermissionService $permission_service)
    {
        $this->user_service = $user_service;
        $this->permission_service = $permission_service;
    }

    public function index()
    {
        $page_title = "Users";
        $user_list = $this->user_service->getUsers();
        return view('users.index', compact("page_title","user_list"));
    }

    public function create()
    {
        $page_title = "Create User";
        $roles = $this->permission_service->getRoles();
        return view('users.create', compact("page_title","roles"));
    }

    public function store(Request $request){
        $form_data = $request->all();
        $validator = $this->validator($form_data);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($form_data);
        }else if($this->user_service->createUser($form_data)) {
            Session::flash('success', 'User saved successfully');
            return redirect('/users');
        }else {
            Session::flash('error', 'Failed to save user');
            return redirect()->back();
        }

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'max:191', 'unique:users'],
            'password' => ['required', 'min:6'],
            'confirm_password' => ['same:password'],
            'role_id' => ['required']
        ]);
    }

    public function edit($user_id)
    {
        $page_title = "Update User";
        $user = $this->user_service->getUser($user_id);
        $roles = $this->permission_service->getRoles();
        return view('users.edit', compact("page_title","user","roles"));
    }

    public function update(Request $request)
    {
        $form_data = $request->all();
        $validator = $this->validator_update($form_data);
        $user = Auth::user();       

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(request()->input());
        }else if($this->user_service->updateUser($form_data)) {
            Session::flash('success', 'User updated successfully');
            return redirect('/users');
        }else {
            Session::flash('error', 'Failed to update user');
            return redirect()->back(); 
        }                    
    }

    /**
     * Get a validator for an user update request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator_update(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'max:191', Rule::unique('users')->ignore($data['user_id'])],
            'password' => ['nullable', 'min:6'],
            'confirm_password' => ['same:password'],
            'role_id' => ['required']
        ]);
    }

    public function delete(Request $request) 
    {
        $form_data = $request->all();
        $data = array();
        $delete_status = $this->user_service->deleteUser($form_data['user_id']);
        if(!$delete_status) {
            $data['success'] = 0;
            $data["error_message"]['failed'] = 'Failed to delete, please try again';
        }else {
            Session::flash('success', 'User has been deleted successfully');
            $data['success'] = 1;
            $data['success_message'] = 'User has been deleted successfully';
        }
        return $data;                  
    }


}
