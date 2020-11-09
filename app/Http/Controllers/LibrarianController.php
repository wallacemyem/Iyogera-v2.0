<?php

namespace App\Http\Controllers;

use App\Librarian;
use App\User;
use Hash;
use Auth;
use Illuminate\Http\Request;

class LibrarianController extends Controller
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
        $title = translate('librarian');
        return view('backend.'.Auth::user()->role.'.librarian.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.librarian.create');
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
            $user->first_name = $request->first_name;
            $user->other_name = $request->other_name;
            $user->middle_name = $request->middle_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = "librarian";
            $user->school_id = school_id();
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->blood_group = $request->blood_group;
            if($user->save()) {
                 flash(translate('librarian_added_successfully'))->success();
               
            
        }else {
            flash('email_duplication')->error();
            
        }

        return redirect()->back();
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function show(Librarian $librarian)
    {
        //
    }

    public function list()
    {
        return view('backend.'.Auth::user()->role.'.librarian.list')->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.'.Auth::user()->role.'.librarian.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Librarian  $librarian
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
                flash(translate('librarian_updated_successfully'))->success();
               
            }
        }else {
            flash('email_duplication')->error();
            
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        flash(translate('librarian_deleted_successfully'))->success();
        return redirect()->back();
    }
}
