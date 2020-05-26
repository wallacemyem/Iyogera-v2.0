<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Section;
use App\payment;
use App\Enroll;
use Auth;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	# code...
    }

    public function success()
    {
    	$get_pay = payment::where(['school_id' => school_id()])->latest()->first();
    	
    	return view('backend.'.Auth::user()->role.'.payment.success_payment', compact('get_pay'));
    }
}