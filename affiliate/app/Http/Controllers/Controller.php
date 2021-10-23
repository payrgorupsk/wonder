<?php

namespace App\Http\Controllers;

use App\Models\WoAppssession;
use Illuminate\Support\Facades\Session;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(WoAppssession $sessions)
    {
        if(isset($_COOKIE['user_id'])){
           $logedin_data = $sessions->where('session_id', $_COOKIE['user_id'])->first();


           if (isset(json_decode($logedin_data)->user_id)){

            $user_id = json_decode($logedin_data)->user_id;


            Session::put( 'user_id', $user_id);

               return true;
           }
           else{
            redirect()->to('http://192.168.0.100/wonder')->send();
        }

        }
        else{
            redirect()->to('http://192.168.0.100/wonder')->send();
        }
    }
}
