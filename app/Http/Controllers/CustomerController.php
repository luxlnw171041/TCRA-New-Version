<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

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

        $requestData = $request->all();
        if (!empty($requestData['c_idno'])) {
            $c_id_no = $requestData['c_idno'];
            $customers = Customer::where('c_idno', $c_id_no)->first();

            // ddd($customers);
                return view('customer.index', compact('customers'));
            

        } elseif (!empty($requestData['c_name']) and !empty($requestData['c_surname'])) {

            $name = $requestData['c_name'];
            $surname = $requestData['c_surname'];

            $customers = Customer::where('c_name', $name)
                ->Where('c_surname',  $surname)
                ->first();

                return view('customer.index', compact('customers'));
        }else{

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
        Customer::create($requestData);

        return redirect('customer')->with('flash_message', 'Customer added!');
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
