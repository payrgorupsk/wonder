<?php

namespace App\Http\Controllers;
use App\Models\Wo_affiliate;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function form(){

        return view('user.affiliate_form');
    }

    public function form_save(Request $request){

        $imageName = time().'.'.$request->nid->extension();  
        $request->nid->move(public_path('form_data'), $imageName);

        $Wo_affiliate = new Wo_affiliate();
        $Wo_affiliate->user_id = $request->user_id;
        $Wo_affiliate->platform = $request->platform;
        $Wo_affiliate->platform_id = $request->platform_id;
        $Wo_affiliate->nid = 'public/form_data/'.$imageName;
        $Wo_affiliate->save();
    }
}
