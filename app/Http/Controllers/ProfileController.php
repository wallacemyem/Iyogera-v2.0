<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = Auth::user()->other_name.' '.Auth::user()->first_name.' '.Auth::user()->middle_name;
        $title = $name;
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
            
            $user->first_name = $request->first_name;
            $user->other_name = $request->other_name;
            $user->middle_name = $request->middle_name;
            $user->phone = $request->phone;
            $user->address = $request->address;
                if ($request->hasFile('user_image')) {
                    $id = $user->id;
                    $dir  = 'backend/images/user_image';
                    $user_image = $request->file('user_image');
                    $user_image->move($dir, $id.".jpg");
                }
                
                $user->save();
                flash(translate('profile_has_been_successfully'))->success();
                
        }elseif($type == 'password') {
            $hasher = app('hash');
            if ($hasher->check($request->old_password, $user->password)) {
                if($request->new_password == $request->confirm_password) {
                    $user->password = Hash::make($request->confirm_password);
                    $user->save();

                    flash(translate('password_has_been_updated_successfully'))->success();
               
                     }else 
                     {
                        flash('password_mismatched')->error();
                    }
                        
                    }else{
                        flash('password_mismatched')->error();
                    }

                }
                    return redirect()->back();
                    
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
