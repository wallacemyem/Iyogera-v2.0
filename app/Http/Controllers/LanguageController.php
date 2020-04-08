<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use File;
use Auth;
use App\Language;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request)
    {
    	$request->session()->put('locale', $request->locale);
    	flash('Language changed to '.$request->locale)->success();
    }

    public function index(Request $request)
    {   
        $title = translate('language_manager');
        return view('backend.'.Auth::user()->role.'.language.index', compact('title'));
    }

    public function create(Request $request)
    {
        return view('backend.'.Auth::user()->role.'.language.create');
    }


    public function edit($id)
    {   
        $language = Language::find($id);
        return view('backend.'.Auth::user()->role.'.language.edit', compact('language'));
    }

    public function store(Request $request)
    {
        $language = new Language;
        $language->name = $request->name;
        $language->code = $request->code;
        saveDefaultJSONFile($request->code);
        if($language->save()){
            $data = array(
                'status' => true,
                'notification' => translate('language_added_successfully'),
            );
        }
        else{
            $data = array(
                'status' => false,
                'notification' => translate('an_error_occured_when_adding_language'),
            );
        }

        return $data;
    }

    public function update(Request $request, $id){
        $language = Language::find($id);
        $language->name = $request->name;
        $language->code = $request->code;
        if($language->save()){
            $data = array(
                'status' => true,
                'notification' => translate('language_added_successfully'),
            );
        }
        else{
            $data = array(
                'status' => false,
                'notification' => translate('an_error_occured_when_adding_language'),
            );
        }
        return $data;
    }

    public function phrase($language_id)
    {
        $language = Language::findOrFail($language_id);
        return view('backend.'.Auth::user()->role.'.language.phrase', compact('language'))->render();
    }

    public function key_value_store(Request $request)
    {
        $language = Language::findOrFail($request->id);
        saveJSONFile($language->code, $request->key, $request->value);
    }

    function list() {
        return view('backend.'.Auth::user()->role.'.language.list')->render();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parent  $parent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language = Language::find($id);
        $language->delete();
        return array(
            'status' => true,
            'notification' => translate('language_has_been_deleted_successfully')
        );
    }
}
