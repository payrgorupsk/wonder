<?php

namespace App\Http\Controllers;

use App\Models\WoAppssession;
use Illuminate\Support\Facades\Session;
use App\Models\WoUser;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /* Check for User Session and redirect if not found */
    public function __construct(WoAppssession $sessions, Request $request)
    {

        if(isset($_COOKIE['user_id'])){
           $logedin_data = $sessions->where('session_id', $_COOKIE['user_id'])->first();
           if (isset(json_decode($logedin_data)->user_id)){
               $user = WoUser::where('user_id',json_decode($logedin_data)->user_id)->get();
            //    $request->setLaravelSession($user->first());
               Session::start();
               Session::put($user->toArray()[0]);
               return true;
           }
           else{
            redirect()->to(env('HOME_URL'))->send();
        }

        }
        else{
            redirect()->to(env('HOME_URL'))->send();
        }
    }
    /* end of __construct */

    public function adminAccess($request){
        if($request->session()->get('admin')!='1')
        {
            return abort(403);
        }
    }
}
