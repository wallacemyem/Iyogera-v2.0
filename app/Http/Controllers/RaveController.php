<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reference;
use App\School;
use App\Payment;

//use the Rave Facade
use Rave;

class RaveController extends Controller
{

  /**
   * Initialize Rave payment process
   * @return void
   */
  public function initialize()
  {
    //This initializes payment and redirects to the payment gateway
    //The initialize method takes the parameter of the redirect URL
    Rave::initialize(route('callback'));
  }

  /**
   * Obtain Rave callback information
   * @return void
   */
  public function callback(Request $request)
  {

          $school_id = school_id();
          $current_session = get_settings('running_session');
              //dd($school_id);
              $schools = School::where(['id' => $school_id])->get();
              foreach ($schools as $value) {
                  # code...
                  $school_name = $value->name;
                  //$value->id;
              }
              $trnx_id = str_slug($school_name).'_'.str_random(10);
              $get_ref = Reference::where(['school_id' => $school_id, 'session' => $current_session])->latest()->first();

          //$txref = $request->ref;
          //dd($get_ref);
          $data = Rave::verifyTransaction($get_ref->tx_ref_id);
          //dd($data);
          $chargeResponsecode = $data->data->chargecode;
          $chargeAmount = $data->data->chargedamount;
          $chargeCurrency = $data->data->currency;
          $amount = $data->data->amount;
          $currency = $data->data->currency;

          $pay = new payment;
          $pay->amount = $amount;
          $pay->school_id = $school_id;
          $pay->time_stamp = date("Y-m-d h:i a");
          $pay->amount_paid = $data->data->chargedamount;
          $pay->tranx_id = $data->data->txref;
          $pay->ip_address = $data->data->ip;
          $pay->currency = $currency;
          $pay->tx_id = $data->data->txid;
          $pay->last_digits = $data->data->card->last4digits;
          $pay->card_type = $data->data->card->type;
          $pay->status = 'Paid';
          $pay->save();

          if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
            // transaction was successful...
            // please check other things like whether you already gave value for this ref
            // if the email matches the customer who owns the product etc
            //Give Value and return to Success page
            flash(translate('payment_successful'))->success();
        return redirect('/success');
            
            } else {
                //Dont Give Value and return to Failure page
            
                return redirect('/failed');
            }

  }

  /**
   * Receives Rave webhook
   * @return void
   */
  public function webhook()
  {
    //This receives the webhook
    $data = Rave::receiveWebhook();
    Log::info(json_encode($data, true));
  }

  /**
   * Receives Rave webhook
   * @return void
   */
  public function verify()
  {
    $txref = "rave_12345";
    
    $data = Rave::verifyTransaction($txref);

    $chargeResponsecode = $data->data->chargecode;
    $chargeAmount = $data->data->amount;
    $chargeCurrency = $data->data->currency;
    
    $amount = 4500;
    $currency = "NGN";
    if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
    // transaction was successful...
    // please check other things like whether you already gave value for this ref
    // if the email matches the customer who owns the product etc
    //Give Value and return to Success page
    
        return redirect('/success');
    
    } else {
        //Dont Give Value and return to Failure page
    
        return redirect('/failed');
    }
  }
}