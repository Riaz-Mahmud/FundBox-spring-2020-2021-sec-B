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

class AccountController extends Controller
{
    public function accountPageShow(Request $request)
    {
    //     return view('Sponsor.ListofAdvertise')
    //     ->with('title', 'All Advertise | Sponsor')
    //    ->with('allAdvertise', $allAdvertise);

    $userId = $request->session()->get('id');
    dd($userId);



        // return view('Sponsor.ManageAccount')
        //         ->with('title', 'Manage Account | Sponsor')
        //         ->with('userId', $userId);

    }

    public function deleteAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        } else {
            $id = $request->input('id');

            $removed=DB::table('userinfos')->where('id', $id)->delete();

            if ($removed) {
                return response()->json([
                    'error' => false,
                    'message' => 'Delete successfully.'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Something went wrong.'
                ]);
            }
        }
    }

}
