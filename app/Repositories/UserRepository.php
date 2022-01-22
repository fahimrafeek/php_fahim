<?php

namespace App\Repositories;

use App\Models\User;
use Exception;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function get($columns = ['*'])
    {
        try {
            return $this->user->with('role')->orderBy('created_at', 'desc')->get($columns);
        }catch(Exception $exception) {
            return false;
        }
    }

    public function paginate($perPage = 15, $columns = ['*'])
    {
        try {
            return $this->user->with('role')->orderBy('created_at', 'desc')->paginate($perPage, $columns);
        }catch(Exception $exception) {
            return false;
        }
    }

    public function create(array $attributes)
    {
        try {
            return $this->user->create($attributes);
        }catch(Exception $exception) {
            return false;
        }
    }

    public function update(array $attributes, $id, $primaryKey = 'id')
    {
        try {
            return $this->user->where($primaryKey, $id)->update($attributes);
        }catch(Exception $exception) {
            return false;
        }
    }

    public function delete($user_id)
    {
        return $this->user->destroy($user_id);
    }

    public function find($id, $columns = ['*'])
    {
        return $this->user->find($id, $columns);
    }
    

}