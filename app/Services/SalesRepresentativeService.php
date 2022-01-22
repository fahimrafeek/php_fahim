<?php

namespace App\Services;

use App\Repositories\SalesRepresentativeRepository;
use Illuminate\Support\Facades\Hash;

class SalesRepresentativeService
{

    protected $sales_representative_repository;

    public function __construct(SalesRepresentativeRepository $sales_representative_repository)
    {
        $this->sales_representative_repository = $sales_representative_repository;
    }

    public function getSalesRepresentatives()
    {
        $columns = ['*'];
        return $this->sales_representative_repository->get($columns);
    }

    public function getPaginateSalesRepresentatives()
    {
        $columns = ['*'];
        return $this->sales_representative_repository->paginate($perPage = 10, $columns);
    }

    public function createSalesRepresentative($form_data)
    {
        $data['first_name'] = $form_data['first_name'];
        $data['last_name'] = $form_data['last_name'];
        $data['email'] = $form_data['email'];
        $data['telephone'] = $form_data['telephone'];
        $data['joined_date'] = $form_data['joined_date'];
        $data['route'] = $form_data['route'];
        $data['comments'] = $form_data['comments'];
        $data['added_by'] = auth()->user()->id;

        return $this->sales_representative_repository->create($data);
    }
    
    public function getSalesRepresentativeDetails($id)
    {
        return $this->sales_representative_repository->find($id, ['*']);
    }

    public function updateSalesRepresentativeDetails($form_data)
    {
        $data['first_name'] = $form_data['first_name'];
        $data['last_name'] = $form_data['last_name'];
        $data['email'] = $form_data['email'];
        $data['telephone'] = $form_data['telephone'];
        $data['joined_date'] = $form_data['joined_date'];
        $data['route'] = $form_data['route'];
        $data['comments'] = $form_data['comments'];

        return $this->sales_representative_repository->update($data, $form_data['id']);
    }

    public function deleteSalesRepresentative($id)
    {
        return $this->sales_representative_repository->delete($id);
    }
    
}

