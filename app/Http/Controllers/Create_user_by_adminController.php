<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use App\Models\Create_user_by_admin;
use Illuminate\Http\Request;

Use Carbon\Carbon;

class Create_user_by_adminController extends Controller
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
            $create_user_by_admin = Create_user_by_admin::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('username', 'LIKE', "%$keyword%")
                ->orWhere('pass_code', 'LIKE', "%$keyword%")
                ->orderBy('id','DESC')
                ->get();
        } else {
            $create_user_by_admin = Create_user_by_admin::orderBy('id','DESC')->get();
        }

        $data_member = User::orderBy('id','DESC')->get();

        return view('create_user_by_admin.index', compact('create_user_by_admin','data_member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('create_user_by_admin.create');
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
        
        Create_user_by_admin::create($requestData);

        return redirect('create_user_by_admin')->with('flash_message', 'Create_user_by_admin added!');
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
        $create_user_by_admin = Create_user_by_admin::findOrFail($id);

        return view('create_user_by_admin.show', compact('create_user_by_admin'));
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
        $create_user_by_admin = Create_user_by_admin::findOrFail($id);

        return view('create_user_by_admin.edit', compact('create_user_by_admin'));
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
        
        $create_user_by_admin = Create_user_by_admin::findOrFail($id);
        $create_user_by_admin->update($requestData);

        return redirect('create_user_by_admin')->with('flash_message', 'Create_user_by_admin updated!');
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
        Create_user_by_admin::destroy($id);

        return redirect('create_user_by_admin')->with('flash_message', 'Create_user_by_admin deleted!');
    }
}
