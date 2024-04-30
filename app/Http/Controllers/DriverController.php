<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $user_id = Auth::user()->id;
        $data_user = User::where('id', $user_id)->first();
        
        $count_search_driver = (int)$data_user->count_search_dri; 
        
        $requestData = $request->all();
        
        // ddd($requestData);
        if(!empty($requestData)){
            $count_search_driver += 1; 
        
            DB::table('users')
            ->where([
                ['id', $user_id],
            ])
            ->update([
                'count_search_dri' => $count_search_driver,
            ]);
        }

        if (!empty($requestData['d_idno'])) {
            // $d_id_no = $requestData['d_idno'];
            $d_id_no = str_replace("-","",$requestData['d_idno']);
            $driver = Driver::where('d_idno', $d_id_no)->first();

            return view('driver.index', compact('driver'));
        }
        else if (!empty($requestData['d_name']) and !empty($requestData['d_surname'])) {

            $d_name = $requestData['d_name'];
            $d_surname = $requestData['d_surname'];

            $driver = Driver::where('d_name', $d_name)
                ->Where('d_surname',  $d_surname)
                ->first();

                return view('driver.index', compact('driver'));
        }
        else if (!empty($requestData['d_name_other_nationalitie']) and !empty($requestData['d_surname_other_nationalitie'])) {

            $d_name_other_nationalitie = $requestData['d_name_other_nationalitie'];
            $d_surname_other_nationalitie = $requestData['d_surname_other_nationalitie'];

            $driver = Driver::where('d_name_other_nationalitie', $d_name_other_nationalitie)
                ->where('d_surname_other_nationalitie', $d_surname_other_nationalitie)
                ->first();

                return view('driver.index', compact('driver'));
        }
        else if (!empty($requestData['d_idno_other_nationalitie'])) {

            $d_idno_other_nationalitie = $requestData['d_idno_other_nationalitie'];

            $driver = Driver::where('d_idno_other_nationalitie', $d_idno_other_nationalitie)
                ->first();

                return view('driver.index', compact('driver'));
        }
        else{

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

        echo "<pre>";
        print_r($requestData);
        echo "<pre>";

        if ($request->hasFile('d_pic_indictment')) {
            
            $d_pic_indictment = $request->file('d_pic_indictment');
            $requestData['d_pic_indictment'] = '' ;

            $count_d_pic_indictment = 'รอบแรก';

            foreach ($d_pic_indictment as $file) {
                if( $count_d_pic_indictment == 'รอบแรก' ){
                    $requestData['d_pic_indictment'] = $file->store('uploads', 'public');
                    $count_d_pic_indictment = 'รอบสอง';
                }else{
                    $requestData['d_pic_indictment'] = $requestData['d_pic_indictment'] . "," . $file->store('uploads', 'public');
                }
            }

        }

        if ($request->hasFile('d_pic_id_card')) {
            
            $d_pic_id_card = $request->file('d_pic_id_card');
            $requestData['d_pic_id_card'] = '' ;

            $count_d_pic_id_card = 'รอบแรก';

            foreach ($d_pic_id_card as $file) {
                if( $count_d_pic_id_card == 'รอบแรก' ){
                    $requestData['d_pic_id_card'] = $file->store('uploads', 'public');
                    $count_d_pic_id_card = 'รอบสอง' ;
                }else{
                    $requestData['d_pic_id_card'] = $requestData['d_pic_id_card'] . "," . $file->store('uploads', 'public');
                }
            }

        }

        exit();


        if ($request->hasFile('d_pic_cap')) {
            
            $d_pic_cap = $request->file('d_pic_cap');
            $requestData['d_pic_cap'] = '' ;

            foreach ($d_pic_cap as $file) {
                if( empty($requestData['d_pic_cap']) ){
                    $requestData['d_pic_cap'] = $file->store('uploads', 'public');
                }else{
                    $requestData['d_pic_cap'] = $requestData['d_pic_cap'] . "," . $file->store('uploads', 'public');
                }
            }

        }

        if ($request->hasFile('d_pic_other')) {
            
            $d_pic_other = $request->file('d_pic_other');
            $requestData['d_pic_other'] = '' ;

            foreach ($d_pic_other as $file) {
                if( empty($requestData['d_pic_other']) ){
                    $requestData['d_pic_other'] = $file->store('uploads', 'public');
                }else{
                    $requestData['d_pic_other'] = $requestData['d_pic_other'] . "," . $file->store('uploads', 'public');
                }
            }

        }

        $demerit = implode(',', array_unique($request->demerit));

        $requestData['demerit'] = $demerit;
        
        $requestData['d_idno'] = str_replace("-","",$requestData['d_idno']);

        Driver::create($requestData);

        // return redirect('driver')->with('flash_message', 'Driver added!');
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

    public function driver_upload_api(Request $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('d_pic_id_card')) {
            
            $d_pic_id_card = $request->file('d_pic_id_card');
            $requestData['d_pic_id_card'] = '' ;

            foreach ($d_pic_id_card as $file) {
                if( empty($requestData['d_pic_id_card']) ){
                    $requestData['d_pic_id_card'] = $file->store('uploads', 'public');
                }else{
                    $requestData['d_pic_id_card'] = $requestData['d_pic_id_card'] . "," . $file->store('uploads', 'public');
                }
            }
        }

        if ($request->hasFile('d_pic_indictment')) {
            
            $d_pic_indictment = $request->file('d_pic_indictment');
            $requestData['d_pic_indictment'] = '' ;

            foreach ($d_pic_indictment as $file) {
                if( empty($requestData['d_pic_indictment']) ){
                    $requestData['d_pic_indictment'] = $file->store('uploads', 'public');
                }else{
                    $requestData['d_pic_indictment'] = $requestData['d_pic_indictment'] . "," . $file->store('uploads', 'public');
                }
            }

        }

        if ($request->hasFile('d_pic_cap')) {
            
            $d_pic_cap = $request->file('d_pic_cap');
            $requestData['d_pic_cap'] = '' ;

            foreach ($d_pic_cap as $file) {
                if( empty($requestData['d_pic_cap']) ){
                    $requestData['d_pic_cap'] = $file->store('uploads', 'public');
                }else{
                    $requestData['d_pic_cap'] = $requestData['d_pic_cap'] . "," . $file->store('uploads', 'public');
                }
            }

        }

        if ($request->hasFile('d_pic_other')) {
            
            $d_pic_other = $request->file('d_pic_other');
            $requestData['d_pic_other'] = '' ;

            foreach ($d_pic_other as $file) {
                if( empty($requestData['d_pic_other']) ){
                    $requestData['d_pic_other'] = $file->store('uploads', 'public');
                }else{
                    $requestData['d_pic_other'] = $requestData['d_pic_other'] . "," . $file->store('uploads', 'public');
                }
            }

        }

        if(!empty($requestData['d_idno'])){
            $requestData['d_idno'] = str_replace("-","",$requestData['d_idno']);
        }

        // echo "<pre>";
        // print_r($requestData);
        // echo "<pre>";
        // exit();
        
        Driver::create($requestData);

        return "ok" ;

    }
}
