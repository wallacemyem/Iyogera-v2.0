<?php

namespace App\Http\Controllers;

use App\Accountant;
use App\User;
use Hash;
use Auth;
use Illuminate\Http\Request;

class AccountantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = translate('accountant');
        return view('backend.'.Auth::user()->role.'.accountant.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.accountant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(count(User::where('email', $request->email)->get()) == 0) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = "accountant";
            $user->school_id = school_id();
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->blood_group = $request->blood_group;
            if($user->save()) {
                $data = array(
                    'status' => true,
                    'notification' => __('accountant_added_successfully')
                );
            }
        }else {
            $data = array(
                'status' => false,
                'notification' => __('email_duplication')
            );
        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function show(Accountant $accountant)
    {
        //
    }

    public function list()
    {
        return view('backend.'.Auth::user()->role.'.accountant.list')->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.'.Auth::user()->role.'.accountant.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(count(User::where('email', $request->email)->where('id', '!=', $user->id)->get()) == 0) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->school_id = school_id();
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->blood_group = $request->blood_group;
            if($user->save()) {
                $data = array(
                    'status' => true,
                    'notification' => translate('accountant_updated_successfully')
                );
            }
        }else {
            $data = array(
                'status' => false,
                'notification' => translate('email_duplication')
            );
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return array(
            'status' => true,
            'notification' => translate('accountant_has_been_deleted_successfully')
        );
    }
}
