<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Customer;
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
            $c_id_no = $requestData['c_idno'];
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
        } if (!empty($requestData['c_company_name'])) {
            $c_company_name = $requestData['c_company_name'];

            $customers = Customer::where('c_company_name', $c_company_name)
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
        if ($request->hasFile('c_pic_id_card')) {
            $requestData['c_pic_id_card'] = $request->file('c_pic_id_card')->store('uploads', 'public');
        }
        if ($request->hasFile('c_pic_company_certificate')) {
            $requestData['c_pic_company_certificate'] = $request->file('c_pic_company_certificate')->store('uploads', 'public');
        }
        if ($request->hasFile('c_pic_indictment')) {
            $requestData['c_pic_indictment'] = $request->file('c_pic_indictment')->store('uploads', 'public');
        }
        if ($request->hasFile('c_pic_cap')) {
            $requestData['c_pic_cap'] = $request->file('c_pic_cap')->store('uploads', 'public');
        }
        if ($request->hasFile('c_pic_other')) {
            $requestData['c_pic_other'] = $request->file('c_pic_other')->store('uploads', 'public');
        }
        
        $demerit = implode(',', array_unique($request->demerit));

        $requestData['demerit'] = $demerit;
        // ddd($requestData);

        if(!empty($requestData['c_name'])){
            $requestData['rentname'] = "บุคคล" ;
        }else{
            $requestData['rentname'] = "บริษัท" ;
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
}
