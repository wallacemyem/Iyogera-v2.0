<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Hash;
use App\Pin;
//use Illuminate\Http\Request;
use Illuminate\Http\Request;

class PinController extends Controller
{
    
	 public function index()
    {
        $title = translate('pin_generation');
        //$view = view('pin.index');
        //dd($view);
        return view('backend.'.Auth::user()->role.'.pin.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.pin.create');
    }

    //
    public function generate(Request $request){

    	//$uq = md5(uniqid(rand(), true));
        
        //dd($uq);
        $copies = $request->copies;
        //dd($copies);
     	for ($i = 0; $i < $copies; $i++ ){

            $uq = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);

        	$data = new Pin;
            
            $data->number = $uq;
            $data->used = 0;
            $data->school_id = school_id();
            $data->session = get_school();
            $data->save();
        //dd($data);
        }
        

        return redirect('pin')->with('status', __($copies. ' Pins Generated!'));
        /*if($pin->save()){
            $data = array(
                'status' => true,
                'notification' => translate('pin_added_successfully')
            );
        }else {
            $data = array(
                'status' => false,
                'notification' => translate('an_error_occured_when_generating_pin')
            );
        }
        return $data;*/
    }

     public function gpin()
    {
        //
        $title = translate('pin_generator');
        return view('backend.'.Auth::user()->role.'.pin.create', compact('title'));
    }

    public function list()
    {
        return view('backend.'.Auth::user()->role.'.pin.list')->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Pin::find($id);
        return view('backend.'.Auth::user()->role.'.pin.edit', compact('book'));
    }

    public function destroy($id)
    {
        if(Pin::destroy($id)){
            $data = array(
                'status' => true,
                'notification' => translate('book_deleted_successfully')
            );
        }else {
            $data = array(
                'status' => false,
                'notification' => translate('an_error_occured_when_deleting_book')
            );
        }
        return $data;
    }
}
