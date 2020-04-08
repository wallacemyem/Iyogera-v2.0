<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = translate('manage_profile');
        return view('backend.'.Auth::user()->role.'.profile.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type)
    {
        $user = Auth::user();
        if($type == 'profile') {
            
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->address = $request->address;
                if ($request->hasFile('user_image')) {
                    $dir  = 'backend/images/user_image';
                    $user_image = $request->file('user_image');
                    $user_image->move($dir, $id.".jpg");
                }
                $user->save();
                $data = array(
                    'status' => true,
                    'notification' => translate('profile_has_been_successfully')
                );
        }elseif($type == 'password') {
            $hasher = app('hash');
            if ($hasher->check($request->old_password, $user->password)) {
                if($request->new_password == $request->confirm_password) {
                    $user->password = Hash::make($request->confirm_password);
                    $user->save();
                    $data = array(
                        'status' => true,
                        'notification' => translate('password_has_been_updated_successfully')
                    );
                }else {
                    $data = array(
                        'status' => false,
                        'notification' => translate('password_mismatched')
                    );
                }
            }else {
                $data = array(
                    'status' => false,
                    'notification' => translate('password_mismatched')
                );
            }
        }

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
