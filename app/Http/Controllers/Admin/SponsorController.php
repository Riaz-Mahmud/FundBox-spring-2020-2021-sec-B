<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SponsorController extends Controller
{
    public function Index(Request $request){

        $pendingSponsor = DB::table('userinfos')
        ->where('type', 3)
        ->where('status',2)
        ->get();

        return view('Admin.SponsorPending')
        ->with('title', 'Pending Sponsor | Admin')
        ->with('pendingSponsor', $pendingSponsor);

    }

    public function Accept(Request $request)
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
            
            $data=array();
            $data['status']='1';

            $update= DB::table('userinfos')
                            ->where('id',$id)
                            ->update($data);

            if ($update) {
                return response()->json([
                    'error' => false,
                    'message' => 'Accept successfully.'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Something went wrong.'
                ]);
            }
        }
    }

    public function Delete(Request $request)
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

    public function ManageIndex(Request $request){

        $allSponsor = DB::table('userinfos')
        ->where('type', 3)
        ->where(function($q) {$q->where('status',0)->orwhere('status',1);})
        ->paginate(10);

        return view('Admin.SponsorManage')
        ->with('title', 'Manage Sponsor | Admin')
        ->with('allSponsor', $allSponsor);

    }

    public function ManageUpdateStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        } else {
            $id = $request->input('id');
            
            $data=array();
            $data['status']=$request->input('status');

            $update= DB::table('userinfos')
                            ->where('id',$id)
                            ->update($data);

            if ($update) {
                return response()->json([
                    'error' => false,
                    'message' => 'Update successfully.'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Something went wrong.'
                ]);
            }
        }
    }

    public function ManageDelete(Request $request)
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
