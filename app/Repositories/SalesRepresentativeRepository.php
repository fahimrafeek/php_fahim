<?php

namespace App\Repositories;

use App\Models\SalesRepresentative;
use Exception;

class SalesRepresentativeRepository
{
    protected $sales_representative;

    public function __construct(SalesRepresentative $sales_representative)
    {
        $this->sales_representative = $sales_representative;
    }

    public function get($columns = ['*'])
    {
        try {
            return $this->sales_representative->with('user:id,first_name,last_name')->orderBy('created_at', 'desc')->get($columns);
        }catch(Exception $exception) {
            return false;
        }
    }

    public function paginate($perPage = 15, $columns = ['*'])
    {
        try {
            return $this->sales_representative->with('user:id,first_name,last_name')->orderBy('created_at', 'desc')->paginate($perPage, $columns);
        }catch(Exception $exception) {
            return false;
        }
    }

    public function create(array $attributes)
    {
        try {
            return $this->sales_representative->create($attributes)->id;
        }catch(Exception $exception) {
            return false;
        }
    }

    public function update(array $attributes, $id, $primaryKey = 'id')
    {
        try {
            $this->sales_representative->where($primaryKey, $id)->update($attributes);
            return $id;
        }catch(Exception $exception) {
            return false;
        }
    }

    public function delete($sales_representative_id)
    {
        return $this->sales_representative->destroy($sales_representative_id);
    }

    public function find($id, $columns = ['*'])
    {
        return $this->sales_representative->find($id, $columns);
    }
    

}