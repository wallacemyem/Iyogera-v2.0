<?php

namespace App\Http\Controllers;

use Moathdev\Office365\Facade\Office365;

class OfficeController extends Controller
{
    public function signin()
    {
        $link = Office365::login();

        return redirect($link);
    }

    public function redirect()
    {
        if (!request()->has('code')) {
            abort(500);
        }

        $code = Office365::getAccessToken(request()->get('code'));

        $user = Office365::getUserInfo($code['token']);

        $messages = Office365::getEmails($code['token']);

        dd($user, $messages);
    }
}