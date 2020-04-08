<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.'.Auth::user()->role.'.role.index');
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
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }

    public function editAccessibility($role) {
        $accessibilites = Role::where('school_id', school_id())->pluck($role)->first();
        return view('backend.'.Auth::user()->role.'.role.accessibility', compact('accessibilites', 'role'));
    }

    public function updateAccessibility(Request $request, $role) {
        $row = Role::where('school_id', school_id())->first();
        $accessibilites = Role::find($row->id);

        if($request->accessibility != null){
            $accessibilites->$role = json_encode($request->accessibility);
        }
        else{
            $accessibilites->$role = json_encode(array());
        }
        $accessibilites->save();
        $data = array(
            'status' => true,
            'view' => view('backend.'.Auth::user()->role.'.role.list')->render(),
            'notification' =>"Successfully updated user role accessibilities"
        );
        return $data;
    }
}
