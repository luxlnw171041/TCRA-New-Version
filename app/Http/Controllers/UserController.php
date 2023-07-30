<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Create_user_by_admin;
Use Carbon\Carbon;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  
    public function index(Request $request)
    {
        // $keyword = $request->get('search');
        // $perPage = 25;

        // if (!empty($keyword)) {
        //     $customer = Customer::where('user_id', 'LIKE', "%$keyword%")
        //         ->orWhere('rentname', 'LIKE', "%$keyword%")
        //         ->orWhere('compname', 'LIKE', "%$keyword%")
        //         ->orWhere('c_name', 'LIKE', "%$keyword%")
        //         ->orWhere('c_surname', 'LIKE', "%$keyword%")
        //         ->orWhere('c_idno', 'LIKE', "%$keyword%")
        //         ->orWhere('demerit', 'LIKE', "%$keyword%")
        //         ->orWhere('demeritdetail', 'LIKE', "%$keyword%")
        //         ->orWhere('c_pic_id_card', 'LIKE', "%$keyword%")
        //         ->orWhere('c_pic_lease', 'LIKE', "%$keyword%")
        //         ->orWhere('c_pic_execution', 'LIKE', "%$keyword%")
        //         ->orWhere('c_pic_cap', 'LIKE', "%$keyword%")
        //         ->orWhere('c_pic_other', 'LIKE', "%$keyword%")
        //         ->orWhere('c_date', 'LIKE', "%$keyword%")
        //         ->latest()->paginate($perPage);
        // } else {
        //     $customer = Customer::latest()->paginate($perPage);
        // }

        return view('customer.index');
    }

    public function create()
    {
        return view('customer.create');
    }

    public function edit(Request $request, $id)
    {
        $user = Auth::user();

        if ($user->id == $id || $user->member_role == "admin") {
            return view('profile.edit', compact('user'));
        }else{
            return view('404');
        }

    }

    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        if ($request->hasFile('member_pic')) {
            $requestData['member_pic'] = $request->file('member_pic')->store('uploads', 'public');
        }
        $users = User::findOrFail($id);
        $users->update($requestData);

        return back();
    }

    public function update_last_time_active($user_id){

        $date_now = date("Y-m-d h:i:s") ;

        DB::table('users')
            ->where([ 
                    ['id', $user_id],
                ])
            ->update([
                    'last_time_active' => $date_now,
                ]);

        return "OK" ;

    }

    public function create_member(Request $request){

        $requestData = $request->all();

        $password = uniqid();

        $requestData['password'] = Hash::make($password);

        User::create($requestData);

        $last_user = User::latest()->first();

        $data_create = $requestData;
        $data_create['check_data'] = "OK" ;
        $data_create['user_id'] = $last_user->id;
        $data_create['member_pic'] = $last_user->member_pic;
        $data_create['username'] = $requestData['username'];
        $data_create['pass_code'] = $password;

        Create_user_by_admin::create($data_create);

        return $data_create;
    }

    function check_email($email){

        $data_check = User::where('email',$email)->first();

        if ( !empty($data_check->id) ) {
            $text_return = "มีข้อมูลอีเมลนี้แล้ว" ;
        }else{
            $text_return = "อีเมลนี้สามารถใช้งานได้" ;
        }

        return $text_return ;
    }

    function change_status_to($change_to , $user_id){

        DB::table('users')
            ->where([ 
                    ['id', $user_id],
                ])
            ->update([
                    'member_status' => $change_to,
                ]);

        return "OK" ;

    }

}
