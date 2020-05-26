<?php

namespace App\Http\Controllers;

use App\Expense;
use Auth;
use Illuminate\Http\Request;

class ExpenseController extends Controller
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
        $title = translate('expense');
        $date_from = strtotime(date('d-M-Y', strtotime(' -30 day')).' 00:00:00');
        $date_to   = strtotime(date('d-M-Y').' 23:59:59');
        return view('backend.'.Auth::user()->role.'.expense.index', compact('title', 'date_from', 'date_to'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.expense.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expense = new Expense;
        $expense->date = strtotime($request->date);
        $expense->amount = $request->amount;
        $expense->expense_category_id = $request->expense_category_id;
        $expense->school_id = school_id();
        $expense->session = get_schools();
        if($expense->save()){

            flash(translate('expense_added_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_adding_expense')->error();
            
        }

        return redirect()->back();
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = Expense::find($id);
        return view('backend.'.Auth::user()->role.'.expense.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expense = Expense::find($id);
        $expense->date = strtotime($request->date);
        $expense->amount = $request->amount;
        $expense->expense_category_id = $request->expense_category_id;
        $expense->school_id = school_id();
        $expense->session = get_schools();
        if($expense->save()){
            flash(translate('expense_updated_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_updating_expense')->error();
            
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Expense::destroy($id)){
            flash(translate('expense_deleted_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_deleting_expense')->error();
            
        }

        return redirect()->back();
            
    }

    public function list(Request $request)
    {
        $date = explode('-', $request->date);
        $date_from = strtotime($date[0].' 00:00:00');
        $date_to   = strtotime($date[1].' 23:59:59');
        $expense_category_id = $request->expense_category_id;
        return view('backend.'.Auth::user()->role.'.expense.list', compact('date_from', 'date_to', 'expense_category_id'))->render();
    }
}
