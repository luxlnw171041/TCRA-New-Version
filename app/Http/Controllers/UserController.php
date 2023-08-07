<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Create_user_by_admin;
Use Carbon\Carbon;
use App\Models\Customer;
use App\Models\Driver;

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
        $user_login = Auth::user();
        $user = User::where('id' , $id)->first();

        if ($user_login->id == $id || $user_login->member_role == "admin") {
            return view('profile.edit', compact('user'));
        }else{
            return view('404');
        }

    }

    public function show_profile($id)
    {
        $user_login = Auth::user();
        $user = User::where('id' , $id)->first();

        if ($user_login->id == $id || $user_login->member_role == "admin") {

            $count_data_add = 0 ;

            if( $user->member_role == "customer" ){

                $data_add_Cus = Customer::where('user_id',$user->id)->get();
                $count_data_add = count($data_add_Cus);

            }else if( $user->member_role == "driver" ){

                $data_add_Dri = Driver::where('user_id',$user->id)->get();
                $count_data_add = count($data_add_Dri);

            }else{

                $data_add_Cus = Customer::where('user_id',$user->id)->get();
                $count_Cus = count($data_add_Cus);

                $data_add_Dri = Driver::where('user_id',$user->id)->get();
                $count_Dri = count($data_add_Dri);
                
                $count_data_add = intval($count_Cus + $count_Dri);

            }

            return view('profile.show', compact('user','count_data_add','id'));
        }else{
            return view('404');
        }
    }

    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();

        if( !empty($requestData['member_status']) ){
            return view('404');
        }

        if( !empty($requestData['member_role']) ){
            return view('404');
        }

        if ($request->hasFile('member_pic')) {
            $requestData['member_pic'] = $request->file('member_pic')->store('uploads', 'public');
        }
        $users = User::findOrFail($id);
        $users->update($requestData);

        // return back();
        return redirect('show_profile/' . $id);
    }

    public function update_last_time_active($user_id){

        $date_now = date("Y-m-d H:i:s") ;

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

        $data_add_Cus = Customer::where('user_id',$last_user->id)->get();
        $count_Cus = count($data_add_Cus);

        $data_add_Dri = Driver::where('user_id',$last_user->id)->get();
        $count_Dri = count($data_add_Dri);

        if(empty($last_user->count_search_cus)){
            $last_user->count_search_cus = '0' ;
        }
        if(empty($last_user->count_search_cus)){
            $last_user->count_search_dri = '0' ;
        }
        if(empty($last_user->member_count_login)){
            $last_user->member_count_login = '..' ;
        }
        if(empty($last_user->last_time_active)){
            $last_user->last_time_active = '..' ;
        }

        $data_create = $requestData;
        $data_create['count_Cus'] = $count_Cus ;
        $data_create['count_Dri'] = $count_Dri ;
        $data_create['check_data'] = "OK" ;
        $data_create['user_id'] = $last_user->id;
        $data_create['member_pic'] = $last_user->member_pic;
        $data_create['member_count_login'] = $last_user->member_count_login;
        $data_create['last_time_active'] = $last_user->last_time_active;
        $data_create['count_search_cus'] = $last_user->count_search_cus;
        $data_create['count_search_dri'] = $last_user->count_search_dri;
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

    function search_member(Request $request){

        $requestData = $request->all();
        $keyword = $requestData['search'];

        if ($keyword == 'all') {
            $data_user = User::orderBy('id','ASC')->get();
        }else{
            $data_user = User::where('name', 'LIKE', "%$keyword%")
                ->orWhere('no_member', 'LIKE', "%$keyword%")
                ->orWhere('username', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('member_co', 'LIKE', "%$keyword%")
                ->orWhere('member_addr', 'LIKE', "%$keyword%")
                ->orWhere('member_tel', 'LIKE', "%$keyword%")
                ->orWhere('member_status', 'LIKE', "%$keyword%")
                ->orWhere('member_role', 'LIKE', "%$keyword%")
                ->orderBy('id','ASC')
                ->get();
        }

        for ($i=0; $i < count($data_user) ; $i++) { 
            // echo $data_user[$i]['id'] ;

            // PASSCODE
            $data_create = Create_user_by_admin::where('user_id' , $data_user[$i]['id'])->first();
            $data_user[$i]['pass_code'] = $data_create->pass_code ;

            // ลงข้อมูล

            if( $data_user[$i]['member_role'] == "customer" ){
                $data_add_Cus = Customer::where('user_id',$data_user[$i]['id'])->get();
                $count_Cus = count($data_add_Cus);
            }else if( $data_user[$i]['member_role'] == "driver" ){
                $data_add_Dri = Driver::where('user_id',$data_user[$i]['id'])->get();
                $count_Dri = count($data_add_Dri);
            }else{
                $data_add_Cus = Customer::where('user_id',$data_user[$i]['id'])->get();
                $count_Cus = count($data_add_Cus);

                $data_add_Dri = Driver::where('user_id',$data_user[$i]['id'])->get();
                $count_Dri = count($data_add_Dri);
                
            }

            $data_user[$i]['count_Cus'] = $count_Cus ;
            $data_user[$i]['count_Dri'] = $count_Dri ;

            if(empty($data_user[$i]['count_search_cus'])){
                $data_user[$i]['count_search_cus'] = '0' ;
            }
            if(empty($data_user[$i]['count_search_dri'])){
                $data_user[$i]['count_search_dri'] = '0' ;
            }
            if(empty($data_user[$i]['member_count_login'])){
                $data_user[$i]['member_count_login'] = '..' ;
            }
            if(empty($data_user[$i]['last_time_active'])){
                $data_user[$i]['last_time_active'] = '..' ;
            }

        }

        return $data_user ;

    }

    function submit_change_pass(Request $request){

        $requestData = $request->all();
        $text_return = '' ;

        $user_id = $requestData['user_id'];
        $old_key = $requestData['old_key'];
        $new_key = $requestData['new_key'];
        $new_key_again = $requestData['new_key_again'];

        $data_create = Create_user_by_admin::where('user_id' , $user_id)->first();

        if( $old_key != $data_create->pass_code ){
            $text_return = 'รหัสผ่านเดิมไม่ถูกต้อง' ;
        }else{

            $new_pass = Hash::make($new_key);

            DB::table('users')
                ->where([ 
                        ['id', $user_id],
                    ])
                ->update([
                        'password' => $new_pass,
                    ]);

            DB::table('create_user_by_admins')
                ->where([ 
                        ['user_id', $user_id],
                    ])
                ->update([
                        'pass_code' => $new_key,
                    ]);

            $text_return = 'เสร็จสิ้น' ;
        }

        return $text_return ;

    }

    function update_pass(Request $request){

        $requestData = $request->all();

        $email = $requestData['email'] ;
        $pass = $requestData['pass'] ;

        $data_user = User::where('email' , $email)->first();

        if( $data_user->member_status != 'Active' ){
            return "NO" ;
        }else{
            DB::table('create_user_by_admins')
                ->where([ 
                        ['user_id', $data_user->id],
                    ])
                ->update([
                        'pass_code' => $pass,
                    ]);

            return "OK" ;
        }

        

    }

}
