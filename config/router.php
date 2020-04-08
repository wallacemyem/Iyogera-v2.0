<?php

namespace Config;
use Hash;
use Auth;
use DB;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Router extends Controller
{   
    static function router() {
        $router = new Router;
        $visibility = $router->visibility_checker();
        
        if(!$visibility) {
            $router->config_router();
        }
    }

    public function visibility_checker() {
		return true;
    }

    private function config_router() {
		return true;
    }
}
