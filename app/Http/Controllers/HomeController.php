<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    function view_data_all($type)
    {   
        if($type == "customers"){
            $data = Customer::where('id' , "!=" , null)->orderBy('id' , 'DESC')->get();
        }else if($type == "drivers"){
            $data = Driver::where('id' , "!=" , null)->orderBy('id' , 'DESC')->get();
        }

        return view('create_user_by_admin.view_data_all', compact('data','type')); 
    }

    function view_data_for_user($type)
    {
        $user_id = Auth::user()->id;

        $data_Customer = Customer::where('user_id' , "!=" , $user_id)->orderBy('id' , 'DESC')->get();
        $data_Driver = Driver::where('user_id' , "!=" , $user_id)->orderBy('id' , 'DESC')->get();

        return view('view_data_for_user', compact('data_Customer' , 'data_Driver','type'));

    }

}
