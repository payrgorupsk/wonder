<?php

namespace App\Http\Controllers;
use App\Models\Wo_affiliate;
use App\Models\WoAppssession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index(){

        $affiliate = Wo_affiliate::where('user_id', Session::get('user_id'))->where('status',1)->first();

        if($affiliate){
            return view('user.dashboard');
        }
        else{
            return view('welcome');
        }

    }

    public function form(){

        $affiliate = Wo_affiliate::where('user_id', Session::get('user_id'))->where('status',1)->first();

        if($affiliate){
            return view('user.dashboard');
        }
        else{
            return view('user.affiliate_form');
        }

    }

    public function form_save(Request $request){

        $imageName = time().'.'.$request->nid->extension();  
        $request->nid->move(public_path('form_data'), $imageName);

        $Wo_affiliate = new Wo_affiliate();
        $Wo_affiliate->user_id = Session::get('user_id');
        $Wo_affiliate->platform = $request->platform;
        $Wo_affiliate->platform_id = $request->platform_id;
        $Wo_affiliate->nid = 'public/form_data/'.$imageName;
        $Wo_affiliate->save();
    }
}
