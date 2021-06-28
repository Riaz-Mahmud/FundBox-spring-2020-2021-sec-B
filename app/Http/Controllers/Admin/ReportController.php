<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function Index(Request $request){

        // $allReports = DB::table('reports')
        $allReports = DB::table('reports')
        ->leftJoin('userinfos', 'reports.user_id', '=', 'userinfos.id')
        ->leftJoin('events', 'reports.event_id', '=', 'events.id')
        ->select('reports.*', 'userinfos.username','userinfos.image','userinfos.name','events.event_name')
        ->paginate(10);
        
        // dd($allReports);
        return view('Admin.ManageReports')
        ->with('title', 'Manage Reports | Admin')
        ->with('allReports', $allReports);

    }

    public function AddReply(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_id' => 'required',
            'edit_reply' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Please Select User'
            ]);
        } else {

            $data=array();
            $data['reply']=$request->input('edit_reply');

            $update= DB::table('reports')
                            ->where('id',$request->input('edit_id'))
                            ->update($data);

            if ($update) {
                return redirect()->back()->with([
                    'error' => false,
                    'message' => 'Replied Successfully'
                ]);
            } else {
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'Something went wrong.'
                ]);
            }
        }
    }
}
