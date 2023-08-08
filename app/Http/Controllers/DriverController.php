<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
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
        if (!empty($requestData['d_idno'])) {
            $d_id_no = $requestData['d_idno'];
            $driver = Driver::where('d_idno', $d_id_no)->first();

            return view('driver.index', compact('driver'));
            

        } elseif (!empty($requestData['compname']) and !empty($requestData['d_name'])) {

            $compname = $requestData['compname'];
            $driver_name = $requestData['d_name'];

            $driver = Driver::where('compname', $compname)
                ->Where('d_name',  $driver_name)
                ->first();

                return view('driver.index', compact('driver'));
        }else{

            return view('driver.index');
        }

        // if (!empty($keyword)) {
        //     $driver = Driver::where('user_id', 'LIKE', "%$keyword%")
        //         ->orWhere('compname', 'LIKE', "%$keyword%")
        //         ->orWhere('commercial_registration', 'LIKE', "%$keyword%")
        //         ->orWhere('d_name', 'LIKE', "%$keyword%")
        //         ->orWhere('d_surname', 'LIKE', "%$keyword%")
        //         ->orWhere('d_idno', 'LIKE', "%$keyword%")
        //         ->orWhere('demerit', 'LIKE', "%$keyword%")
        //         ->orWhere('demeritdetail', 'LIKE', "%$keyword%")
        //         ->orWhere('d_pic_id_card', 'LIKE', "%$keyword%")
        //         ->orWhere('d_pic_lease', 'LIKE', "%$keyword%")
        //         ->orWhere('d_pic_cap', 'LIKE', "%$keyword%")
        //         ->orWhere('d_pic_other', 'LIKE', "%$keyword%")
        //         ->orWhere('d_date', 'LIKE', "%$keyword%")
        //         ->latest()->paginate($perPage);
        // } else {
        //     $driver = Driver::latest()->paginate($perPage);
        // }

        // return view('driver.index', compact('driver'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('driver.create');
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

        if ($request->hasFile('d_pic_id_card')) {
            $requestData['d_pic_id_card'] = $request->file('d_pic_id_card')->store('uploads', 'public');
        }
        if ($request->hasFile('d_pic_indictment')) {
            $requestData['d_pic_indictment'] = $request->file('d_pic_indictment')->store('uploads', 'public');
        }
        if ($request->hasFile('d_pic_cap')) {
            $requestData['d_pic_cap'] = $request->file('d_pic_cap')->store('uploads', 'public');
        }
        if ($request->hasFile('d_pic_other')) {
            $requestData['d_pic_other'] = $request->file('d_pic_other')->store('uploads', 'public');
        }
        
        $demerit = implode(',', array_unique($request->demerit));

        $requestData['demerit'] = $demerit;
        
        Driver::create($requestData);

        return redirect('driver')->with('flash_message', 'Driver added!');
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
        $driver = Driver::findOrFail($id);

        return view('driver.show', compact('driver'));
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
        $driver = Driver::findOrFail($id);

        return view('driver.edit', compact('driver'));
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
        
        $driver = Driver::findOrFail($id);
        $driver->update($requestData);

        return redirect('driver')->with('flash_message', 'Driver updated!');
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
        Driver::destroy($id);

        return redirect('driver')->with('flash_message', 'Driver deleted!');
    }
}
