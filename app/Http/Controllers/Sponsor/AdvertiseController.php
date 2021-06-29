<?php

namespace App\Http\Controllers\Sponsor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdvertiseController extends Controller
{
    public function Show(Request $request){

       $allAdvertise = DB::table('sponsor_banners')
        ->where('status', 1)
        ->get();
        // $allAdvertise = "test";
        // dd($allAdvertise);

        return view('Sponsor.ListofAdvertise')
        ->with('title', 'All Advertise | Sponsor')
       ->with('allAdvertise', $allAdvertise);

    }


}
