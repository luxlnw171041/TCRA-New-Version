<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Customer;
use App\Models\Driver;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        $user_id = Auth::user()->id;
        $data_user = User::where('id', $user_id)->first();
        
        $count_search_cus = (int)$data_user->count_search_cus; 
        
        $requestData = $request->all();
        
        if(!empty($requestData)){
            $count_search_cus += 1; 
        
            DB::table('users')
            ->where([
                ['id', $user_id],
            ])
            ->update([
                'count_search_cus' => $count_search_cus,
            ]);
        }

        if (!empty($requestData['c_idno'])) {
            // $c_id_no = $requestData['c_idno'];
            $c_id_no = str_replace("-","",$requestData['c_idno']);
            $customers = Customer::where('c_idno', $c_id_no)->first();

            // ddd($customers);
                return view('customer.index', compact('customers'));
            

        }
        
        if (!empty($requestData['c_name']) and !empty($requestData['c_surname'])) {

            $name = $requestData['c_name'];
            $surname = $requestData['c_surname'];

            $customers = Customer::where('c_name', $name)
                ->Where('c_surname',  $surname)
                ->first();

                return view('customer.index', compact('customers'));
        }

        if (!empty($requestData['commercial_registration'])) {
            $commercial_registration = $requestData['commercial_registration'];

            $customers = Customer::where('commercial_registration', $commercial_registration)
            ->first();

            return view('customer.index', compact('customers'));
        }

        if (!empty($requestData['c_company_name'])) {
            $c_company_name = $requestData['c_company_name'];

            $customers = Customer::where('c_company_name', $c_company_name)
            ->first();

            return view('customer.index', compact('customers'));
        }

        if (!empty($requestData['c_idno_other_nationalitie'])) {
            $c_idno_other_nationalitie = $requestData['c_idno_other_nationalitie'];

            $customers = Customer::where('c_idno_other_nationalitie', $c_idno_other_nationalitie)
            ->first();

            return view('customer.index', compact('customers'));
        }

        if (!empty($requestData['c_name_other_nationalitie']) and !empty($requestData['c_surname_other_nationalitie'])) {
            $c_name_other_nationalitie = $requestData['c_name_other_nationalitie'];
            $c_surname_other_nationalitie = $requestData['c_surname_other_nationalitie'];

            $customers = Customer::where('c_name_other_nationalitie', $c_name_other_nationalitie)
                ->where('c_surname_other_nationalitie', $c_surname_other_nationalitie)
                ->first();

            return view('customer.index', compact('customers'));
        }

        else{

            return view('customer.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();
        // ddd($requestData);

        // echo "<pre>";
        // print_r($requestData);
        // echo "<pre>";
        // exit();


        if ($request->hasFile('c_pic_id_card')) {
            
            $c_pic_id_card = $request->file('c_pic_id_card');
            $requestData['c_pic_id_card'] = '' ;

            foreach ($c_pic_id_card as $file) {
                if( empty($requestData['c_pic_id_card']) ){
                    $requestData['c_pic_id_card'] = $file->store('uploads', 'public');
                }else{
                    $requestData['c_pic_id_card'] = $requestData['c_pic_id_card'] . "," . $file->store('uploads', 'public');
                }
            }
        }

        if ($request->hasFile('c_pic_company_certificate')) {
            
            $c_pic_company_certificate = $request->file('c_pic_company_certificate');
            $requestData['c_pic_company_certificate'] = '' ;

            foreach ($c_pic_company_certificate as $file) {
                if( empty($requestData['c_pic_company_certificate']) ){
                    $requestData['c_pic_company_certificate'] = $file->store('uploads', 'public');
                }else{
                    $requestData['c_pic_company_certificate'] = $requestData['c_pic_company_certificate'] . "," . $file->store('uploads', 'public');
                }
            }

        }

        if ($request->hasFile('c_pic_indictment')) {
            
            $c_pic_indictment = $request->file('c_pic_indictment');
            $requestData['c_pic_indictment'] = '' ;

            foreach ($c_pic_indictment as $file) {
                if( empty($requestData['c_pic_indictment']) ){
                    $requestData['c_pic_indictment'] = $file->store('uploads', 'public');
                }else{
                    $requestData['c_pic_indictment'] = $requestData['c_pic_indictment'] . "," . $file->store('uploads', 'public');
                }
            }

        }

        if ($request->hasFile('c_pic_cap')) {
            
            $c_pic_cap = $request->file('c_pic_cap');
            $requestData['c_pic_cap'] = '' ;

            foreach ($c_pic_cap as $file) {
                if( empty($requestData['c_pic_cap']) ){
                    $requestData['c_pic_cap'] = $file->store('uploads', 'public');
                }else{
                    $requestData['c_pic_cap'] = $requestData['c_pic_cap'] . "," . $file->store('uploads', 'public');
                }
            }

        }

        if ($request->hasFile('c_pic_other')) {
            
            $c_pic_other = $request->file('c_pic_other');
            $requestData['c_pic_other'] = '' ;

            foreach ($c_pic_other as $file) {
                if( empty($requestData['c_pic_other']) ){
                    $requestData['c_pic_other'] = $file->store('uploads', 'public');
                }else{
                    $requestData['c_pic_other'] = $requestData['c_pic_other'] . "," . $file->store('uploads', 'public');
                }
            }

        }

        $demerit = implode(',', array_unique($request->demerit));

        $requestData['demerit'] = $demerit;
        // ddd($requestData);

        if(!empty($requestData['c_name'])){
            $requestData['rentname'] = "บุคคล" ;
        }else{
            $requestData['rentname'] = "บริษัท" ;
        }

        if(!empty($requestData['c_idno'])){
            $requestData['c_idno'] = str_replace("-","",$requestData['c_idno']);
        }
        
        Customer::create($requestData);

        // return redirect('customer.create')->with('flash_message', 'Customer added!');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $customer = Customer::findOrFail($id);
        $customer->update($requestData);

        return redirect('customer')->with('flash_message', 'Customer updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Customer::destroy($id);

        return redirect('customer')->with('flash_message', 'Customer deleted!');
    }

    public function customer_test()
    {
        $customer = Customer::latest()->get();

        echo "<pre>";
        print_r($customer);
        echo "<pre>";
        exit();
    }

    public function customer_upload_api(Request $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('c_pic_id_card')) {
            
            $c_pic_id_card = $request->file('c_pic_id_card');
            $requestData['c_pic_id_card'] = '' ;

            foreach ($c_pic_id_card as $file) {
                if( empty($requestData['c_pic_id_card']) ){
                    $requestData['c_pic_id_card'] = $file->store('uploads', 'public');
                }else{
                    $requestData['c_pic_id_card'] = $requestData['c_pic_id_card'] . "," . $file->store('uploads', 'public');
                }
            }
        }

        if ($request->hasFile('c_pic_company_certificate')) {
            
            $c_pic_company_certificate = $request->file('c_pic_company_certificate');
            $requestData['c_pic_company_certificate'] = '' ;

            foreach ($c_pic_company_certificate as $file) {
                if( empty($requestData['c_pic_company_certificate']) ){
                    $requestData['c_pic_company_certificate'] = $file->store('uploads', 'public');
                }else{
                    $requestData['c_pic_company_certificate'] = $requestData['c_pic_company_certificate'] . "," . $file->store('uploads', 'public');
                }
            }

        }

        if ($request->hasFile('c_pic_indictment')) {
            
            $c_pic_indictment = $request->file('c_pic_indictment');
            $requestData['c_pic_indictment'] = '' ;

            foreach ($c_pic_indictment as $file) {
                if( empty($requestData['c_pic_indictment']) ){
                    $requestData['c_pic_indictment'] = $file->store('uploads', 'public');
                }else{
                    $requestData['c_pic_indictment'] = $requestData['c_pic_indictment'] . "," . $file->store('uploads', 'public');
                }
            }

        }

        if ($request->hasFile('c_pic_cap')) {
            
            $c_pic_cap = $request->file('c_pic_cap');
            $requestData['c_pic_cap'] = '' ;

            foreach ($c_pic_cap as $file) {
                if( empty($requestData['c_pic_cap']) ){
                    $requestData['c_pic_cap'] = $file->store('uploads', 'public');
                }else{
                    $requestData['c_pic_cap'] = $requestData['c_pic_cap'] . "," . $file->store('uploads', 'public');
                }
            }

        }

        if ($request->hasFile('c_pic_other')) {
            
            $c_pic_other = $request->file('c_pic_other');
            $requestData['c_pic_other'] = '' ;

            foreach ($c_pic_other as $file) {
                if( empty($requestData['c_pic_other']) ){
                    $requestData['c_pic_other'] = $file->store('uploads', 'public');
                }else{
                    $requestData['c_pic_other'] = $requestData['c_pic_other'] . "," . $file->store('uploads', 'public');
                }
            }

        }

        if(!empty($requestData['c_name'])){
            $requestData['rentname'] = "บุคคล" ;
        }
        else if(!empty($requestData['c_name_other_nationalitie'])){
            $requestData['rentname'] = "บุคคล" ;
        }
        else{
            $requestData['rentname'] = "บริษัท" ;
        }

        if(!empty($requestData['c_idno'])){
            $requestData['c_idno'] = str_replace("-","",$requestData['c_idno']);
        }

        // echo "<pre>";
        // print_r($requestData);
        // echo "<pre>";
        // exit();
        
        Customer::create($requestData);

        return "ok" ;

    }

    function delete_case($id , $type)
    {
        if ($type == "customers") {
            $customer = Customer::where('id', $id)->first();
            if ($customer) {
                $customer->delete();
            }
        } else {
            $driver = Driver::where('id', $id)->first();
            if ($driver) {
                $driver->delete();
            }
        }

        return "success" ;
    }
}
