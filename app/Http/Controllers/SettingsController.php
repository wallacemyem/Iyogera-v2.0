<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\School;
use Auth;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function system()
    {   
        $title = translate('system_settings');
        $settings_type = "system";
        return view('backend.'.Auth::user()->role.'.settings.index', compact('settings_type', 'title'));
    }
    public function system_update(Request $request)
    {   
        $appNameChangeFlag = false;

        $settings = Setting::find(1);
        
        if($settings->system_name != $request->system_name) {
            $appNameChangeFlag = true;
        }

        $settings->system_name = $request->system_name;
        $settings->system_email = $request->system_email;
        $settings->system_title = $request->system_title;
        $settings->phone = $request->phone;
        $settings->purchase_code = $request->purchase_code;
        $settings->address = $request->address;
        $settings_type = "system";
        $settings->save();
        
        $this->writeEnvironmentFile('APP_NAME',$settings->system_name);
        $this->writeEnvironmentFile('TIMEZONE',$request->timezone);

        if($appNameChangeFlag){
            Auth::logout();
            return redirect()->route('login');
        }

        flash(translate('system_updated_successfully'))->success();
        return back();
    }

    public function logo_update(Request $request) {
        if ($request->hasFile('logo')) {
            $dir  = 'public/backend/images';
            $logo = $request->file('logo');
            $logo->move($dir, 'logo-dark.png');
            $data = array(
                'status' => true,
                'notification' => translate('please_reload_the_browser_to_load_the_image')
            );
        }else {
            $data = array(
                'status' => false,
                'notification' => translate('an_error_occured_when_updating_system')
            );
        }
        return $data;
    }

    public function payment()
    {
        $title = translate('payment_settings');
        $settings_type = "payment";
        return view('backend.'.Auth::user()->role.'.settings.index', compact('settings_type', 'title'));
    }

    public function payment_update(Request $request, $type)
    {
        $settings = Setting::find(1);
        if($type == 'stripe'){
            $settings->stripe_active = $request->stripe_active;
            $settings->stripe_mode = $request->stripe_mode;
            $settings->stripe_test_secret_key = $request->stripe_test_secret_key;
            $settings->stripe_test_public_key = $request->stripe_test_public_key;
            $settings->stripe_live_secret_key = $request->stripe_live_secret_key;
            $settings->stripe_live_public_key = $request->stripe_live_public_key;
            $settings_type = "payment";

            if($settings->save()){
                $data = array(
                    'status' => true,
                    'notification' => translate('stripe_settings_updated_successfully')
                );
            }else {
                $data = array(
                    'status' => false,
                    'notification' => translate('an_error_occured_when_updating_stripe_settings')
                );
            }
        }elseif($type == 'paypal'){
            $settings->paypal_active = $request->paypal_active;
            $settings->paypal_mode = $request->paypal_mode;
            $settings->paypal_client_id_sandbox = $request->paypal_client_id_sandbox;
            $settings->paypal_client_id_production = $request->paypal_client_id_production;
            $settings_type = "payment";

            if($settings->save()){
                $data = array(
                    'status' => true,
                    'notification' => translate('paypal_settings_updated_successfully')
                );
            }else {
                $data = array(
                    'status' => false,
                    'notification' => translate('an_error_occured_when_updating_paypal_settings')
                );
            }
        }
        return $data;
    }
    public function sms()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function smtp()
    {   
        $title = translate('smtp_settings');
        $settings_type = "smtp";
        return view('backend.'.Auth::user()->role.'.settings.index', compact('settings_type', 'title'));
    }

    function smtpUpdate(Request $request) {
        
        $path = base_path('.env');
            if (file_exists($path)) {
                foreach ($request->types as $type) {
                    $this->writeEnvironmentFile($type, $request[$type]);
                    // file_put_contents($path, str_replace(
                    //     $type.'='.env($type), $type.'='.$request[$type], file_get_contents($path)
                    // ));
                }
            }
            $data = array(
                'status' => true,
                'notification' => translate('SMTP_settings_updated_successfully')
            );
            return $data;
    }

    public function school_settings() {
        $title = translate('school_settings');
        $settings_type = "school";
        $school_data = School::find(school_id());
        return view('backend.'.Auth::user()->role.'.settings.index', compact('settings_type', 'title', 'school_data'));
    }

    public function school_settings_update(Request $request, $id) {
        $school = School::find($id);
        $school->short = $request->id_short;
        $school->name = $request->school_name;
        $school->phone = $request->phone;
        $school->address = $request->address;
        
        $school->save();
        $data = array(
            'status' => true,
            'notification' => translate('school_settings_updated_successfully')
        );
        return $data;
    }

    public function writeEnvironmentFile($type, $val) {
        $val = '"'.trim($val).'"';
        $path = base_path('.env');
            if (file_exists($path)) {
                file_put_contents($path, str_replace(
                    $type.'="'.env($type).'"', $type.'='.$val, file_get_contents($path)
                ));
            }
    }
}
