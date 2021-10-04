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
        ->select('*')
        ->join('wo_users','wo_affiliates.user_id','=','wo_users.user_id')
        ->paginate(10);

        return view('admin.approve', compact('Wo_affiliate'));
    }
}
