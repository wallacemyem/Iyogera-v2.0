<?php

namespace App\Http\Controllers;

use App\ExpenseCategory;
use Auth;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $title = translate('expense_category');
        return view('backend.'.Auth::user()->role.'.expense_category.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.expense_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return dd($request->all());
        $expense_category = new ExpenseCategory;
        $expense_category->name = $request->name;
        $expense_category->school_id = school_id();
        $expense_category->session = get_school();
        if($expense_category->save()){
            $data = array(
                'status' => true,
                'notification' => translate('expense_category_added_successfully')
            );
        }else {
            $data = array(
                'status' => false,
                'notification' => translate('an_error_occured_when_adding_expense_category')
            );
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseCategory $expenseCategory)
    {
        //
    }

    public function list()
    {
        return view('backend.'.Auth::user()->role.'.expense_category.list')->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense_category = ExpenseCategory::find($id);
        return view('backend.'.Auth::user()->role.'.expense_category.edit', compact('expense_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expense_category = ExpenseCategory::find($id);
        $expense_category->name = $request->name;
        $expense_category->school_id = school_id();
        $expense_category->session = get_school();
        if($expense_category->save()){
            $data = array(
                'status' => true,
                'notification' => translate('expense_category_updated_successfully')
            );
        }else {
            $data = array(
                'status' => false,
                'notification' => translate('an_error_occured_when_updating_expense_category')
            );
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(ExpenseCategory::destroy($id)){
            $data = array(
                'status' => true,
                'notification' => translate('expense_category_deleted_successfully')
            );
        }else {
            $data = array(
                'status' => false,
                'notification' => translate('an_error_occured_when_deleting_expense_category')
            );
        }
        return $data;
    }
}
