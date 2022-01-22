<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use Validator;
use Illuminate\Validation\Rule;
use App\Services\UserService;
use App\Services\SalesRepresentativeService;

class SalesRepresentativeController extends Controller
{
    protected $user_service;
    protected $sales_representative_service;

    public function __construct(UserService $user_service, SalesRepresentativeService $sales_representative_service)
    {
        $this->user_service = $user_service;
        $this->sales_representative_service = $sales_representative_service;
    }

    public function index()
    {
        $page_title = "Sales Representatives";
        $sales_representatives_list = $this->sales_representative_service->getPaginateSalesRepresentatives();
        
        return view('sales.index', compact("page_title","sales_representatives_list"));
    }

    public function create()
    {
        $page_title = "Add Sales Representative";
        return view('sales.create', compact("page_title"));
    }

    public function store(Request $request){
        $form_data = $request->all();
        $validator = $this->validator($form_data);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($form_data);
        }else if($this->sales_representative_service->createSalesRepresentative($form_data)) {
            Session::flash('success', 'Sales Representative added successfully');
            return redirect('/sales-representatives');
        }else {
            Session::flash('error', 'Failed to add Sales Representative');
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
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:191', 'unique:sales_representatives'],
            'telephone' => ['required', 'numeric'],
            'joined_date' => ['required']
        ]);
    }

    public function edit($id)
    {
        $page_title = "Update Sales Representative";
        $sales_representative = $this->sales_representative_service->getSalesRepresentativeDetails($id);
        return view('sales.edit', compact("page_title","sales_representative"));
    }

    public function update(Request $request)
    {
        $form_data = $request->all();
        $validator = $this->validator($form_data);
        $user = Auth::user();       

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(request()->input());
        }else if($this->sales_representative_service->updateSalesRepresentativeDetails($form_data)) {
            Session::flash('success', 'Sales Representative updated successfully');
            return redirect('/sales-representatives');
        }else {
            Session::flash('error', 'Failed to update Sales Representative');
            return redirect()->back(); 
        }                    
    }

    public function delete(Request $request) 
    {
        $form_data = $request->all();
        $data = array();
        $delete_status = $this->sales_representative_service->deleteSalesRepresentative($form_data['id']);
        if(!$delete_status) {
            $data['success'] = 0;
            $data["error_message"]['failed'] = 'Failed to delete, please try again';
            Session::flash('success', 'Failed to delete, please try again');
        }else {
            $data['success'] = 1;
            $data['success_message'] = 'Sales Representative has been deleted successfully';
            Session::flash('success', 'Sales Representative has been deleted successfully');
        }
        return $data;                  
    }


}
