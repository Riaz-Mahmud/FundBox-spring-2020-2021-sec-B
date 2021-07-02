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

    $userId = $request->session()->get('user_id');
   // dd($userId);

   $UserInfo = DB::table('userinfos')
        ->where('id', $userId)
        ->first();

    
        //dd ($UserInfo);


        return view('Sponsor.ManageAccount')
                ->with('title', 'Manage Account | Sponsor')
                ->with('userInfo', $UserInfo);

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

                $spId = DB::table('sponsors')
                ->where('user_id',$id)
                 ->first();

                

                $data=array();
                $data['status']='3';

                $update= DB::table('sponsor_banners')
                            ->where('sponsor_Id',$spId->id)
                            ->update($data);

                $removed1=DB::table('sponsors')->where('user_id', $id)->delete();

                return redirect('/logout');
                // return response()->json([
                //     'error' => false,
                //     'message' => 'Delete successfully.'
                // ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Something went wrong.'
                ]);
            }
        }
    }

}
