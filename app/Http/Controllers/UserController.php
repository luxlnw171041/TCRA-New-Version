<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

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

    public function edit()
    {
        $user = Auth::user();

        return view('profile.edit', compact('user'));
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

}
