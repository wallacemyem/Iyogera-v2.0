<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Classes;
use App\Section;
use App\Enroll;
use Auth;
use Illuminate\Http\Request;

class InvoiceController extends Controller
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
        $title = translate('student_fee_manager');
        $date_from = strtotime(date('d-M-Y', strtotime(' -30 day')).' 00:00:00');
        $date_to   = strtotime(date('d-M-Y').' 23:59:59');
        return view('backend.'.Auth::user()->role.'.invoice.index', compact('title', 'date_from', 'date_to'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function single_invoice_create()
    {
        return view('backend.'.Auth::user()->role.'.invoice.create_single');
    }

    public function mass_invoice_create()
    {
        return view('backend.'.Auth::user()->role.'.invoice.create_mass');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function single_invoice_store(Request $request)
    {
        $invoice = new Invoice;
        $invoice->title = $request->title;
        $invoice->total_amount = $request->total_amount;
        $invoice->paid_amount = $request->paid_amount;
        $invoice->class_id = $request->class_id;
        $invoice->student_id = $request->student_id;
        $invoice->status = $request->status;
        $invoice->school_id = school_id();
        $invoice->session = get_schools();
        if($invoice->save()){
            flash(translate('invoice_added_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_adding_invoice')->error();
            
        }

        return redirect()->back();
            
    }

    public function mass_invoice_store(Request $request)
    {
        $section_id  = $request->section_id;
        $class_id = $request->class_id;
        $running_session = get_schools();
        $school_id = school_id();
        $students = Enroll::where(['section_id' => $section_id, 'class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->get();
        foreach($students as $student) {
            $invoice = new Invoice;
            $invoice->title = $request->title;
            $invoice->total_amount = $request->total_amount;
            $invoice->paid_amount = $request->paid_amount;
            $invoice->class_id = $class_id ;
            $invoice->student_id = $student->student_id;
            $invoice->status = $request->status;
            $invoice->school_id = school_id();
            $invoice->session = get_schools();
            $invoice->save();
        }

        flash(translate('invoice_updated_successfully'))->success();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function single_invoice_edit($id)
    {
        $invoice = Invoice::find($id);
        return view('backend.'.Auth::user()->role.'.invoice.edit_single', compact('invoice'));

    }

    public function mass_invoice_edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function single_invoice_update(Request $request, $id)
    {
        $invoice = Invoice::find($id);
        $invoice->title = $request->title;
        $invoice->total_amount = $request->total_amount;
        $invoice->paid_amount = $request->paid_amount;
        $invoice->class_id = $request->class_id;
        $invoice->student_id = $request->student_id;
        $invoice->status = $request->status;
        $invoice->school_id = school_id();
        $invoice->session = get_schools();
        if($invoice->save()){
           flash(translate('invoice_updated_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_updating_invoice')->error();
            
        }

        return redirect()->back();
    }

    public function mass_invoice_update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();
        flash(translate('invoice_deleted_successfully'))->success();

        return redirect()->back();
    }

    public function list(Request $request)
    {
        $date = explode('-', $request->date);
        $date_from = strtotime($date[0].' 00:00:00');
        $date_to   = strtotime($date[1].' 23:59:59');
        return view('backend.'.Auth::user()->role.'.invoice.list', compact('date_from', 'date_to'))->render();
    }
}
