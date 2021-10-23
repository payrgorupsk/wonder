<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wo_affiliate;
use DB;

class ApproveController extends Controller
{

    public function index(){


        $Wo_affiliate = DB::table('wo_affiliates')
        ->select('wo_affiliates.*', 'wo_users.first_name', 'wo_users.last_name')
        ->join('wo_users','wo_affiliates.user_id','=','wo_users.user_id')
        ->paginate(10);



        return view('admin.approve', compact('Wo_affiliate'));
    }

    public function approve($id){

        $Wo_affiliate = Wo_affiliate::find($id);
        $Wo_affiliate->status = 1;
        $Wo_affiliate->save();

        return redirect()->route('admin.dashboard');
    }

    public function delete($id){

        $Wo_affiliate = Wo_affiliate::find($id);
        $Wo_affiliate->delete();

        return redirect()->route('admin.dashboard');
    }
}
