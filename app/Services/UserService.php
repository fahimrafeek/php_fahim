<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{

    protected $user_repository;

    public function __construct(UserRepository $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function getUsers()
    {
        $columns = ['id','first_name','last_name','email','role_id'];
        return $this->user_repository->paginate($perPage = 10, $columns);
    }

    public function createUser($form_data){
        $data['first_name'] = $form_data['first_name'];
        $data['last_name'] = $form_data['last_name'];
        $data['email'] = $form_data['email'];
        $data['role_id'] = $form_data['role_id'];
        $data['password'] = Hash::make($form_data['password']);
        return $this->user_repository->create($data);
    }
    
    public function getUser($user_id){
        return $this->user_repository->find($user_id, ['*']);
    }

    public function updateUser($form_data){
        $data['first_name'] = $form_data['first_name'];
        $data['last_name'] = $form_data['last_name'];
        $data['email'] = $form_data['email'];
        $data['role_id'] = $form_data['role_id'];
        if(isset($form_data['password']) && !empty($form_data['password'])){
            $data['password'] = Hash::make($form_data['password']);
        }
        return $this->user_repository->update($data,  $form_data['user_id']);
    }

    public function deleteUser($user_id){
        return $this->user_repository->delete($user_id);
    }
    
}

