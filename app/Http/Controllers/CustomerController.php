<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

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

        if (!empty($keyword)) {
            $customer = Customer::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('rentname', 'LIKE', "%$keyword%")
                ->orWhere('compname', 'LIKE', "%$keyword%")
                ->orWhere('c_name', 'LIKE', "%$keyword%")
                ->orWhere('c_surname', 'LIKE', "%$keyword%")
                ->orWhere('c_idno', 'LIKE', "%$keyword%")
                ->orWhere('demerit', 'LIKE', "%$keyword%")
                ->orWhere('demeritdetail', 'LIKE', "%$keyword%")
                ->orWhere('c_pic_id_card', 'LIKE', "%$keyword%")
                ->orWhere('c_pic_lease', 'LIKE', "%$keyword%")
                ->orWhere('c_pic_execution', 'LIKE', "%$keyword%")
                ->orWhere('c_pic_cap', 'LIKE', "%$keyword%")
                ->orWhere('c_pic_other', 'LIKE', "%$keyword%")
                ->orWhere('c_date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $customer = Customer::latest()->paginate($perPage);
        }

        return view('customer.index', compact('customer'));
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
        ddd($requestData);
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
        $data = Customer::where('c_name', '!=' , null)->get();

        echo "<pre>";
        print_f($data);
        echo "<pre>";
        exit();
    }

}
