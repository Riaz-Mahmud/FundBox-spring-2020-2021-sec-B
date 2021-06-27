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

class EventController extends Controller
{
    public function Index(Request $request){

        $allCategory = DB::table('event_categorys')
        ->where('status', 1)
        ->get();

        return view('Admin.adminEvent')
        ->with('title', 'Create Admin Event | Admin')
        ->with('allCategory', $allCategory);

    }

    public function CreateAdminEvent(Request $request){

        $validator = Validator::make($request->all(), [
            'event_name' => 'required|min:5',
            'event_details' => 'required',
            'event_category' => 'required',
            'event_amount' => 'required',
            'date' => 'required',
            'event_phone' => 'required|min:11|max:15',
            'image' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        }else{

            $image = $request->file('image');
            $image_name=$image->getClientOriginalName();
            $image_ext=$image->getClientOriginalExtension();
            $image_new_name =strtoupper(Str::random(6));
            $image_full_name=$image_new_name.'.'.$image_ext;
            $upload_path='images/event/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $imageData='/images/event/'.$image_full_name;

            
            $data=array();
            $data['event_name']=$request->event_name;
            $data['image']=$imageData;
            $data['details']=$request->event_details;
            $data['contact']=$request->event_phone;
            $data['eventCategory']=$request->event_category;
            $data['eventType']='1';
            $data['targetMoney']=$request->event_amount;
            $data['targetDate']=$request->date;
            $data['status']=$request->status;
            $data['isAdminEvent']='1';

            $insert = DB::table('events')->insert($data);

            if($insert){
                return redirect()->back()->with([
                    'error' => false,
                    'message' => 'Create Successfully'
                ]);
            }else{
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'Something going wrong'
                ]);
            }
        }
    }

    public function EventOrgIndex(Request $request){

        $allCategory = DB::table('event_categorys')
        ->where('status', 1)
        ->get();
        $allOrg = DB::table('organizations')
        ->where('status', 1)->orderBy('id','DESC')
        ->get();

        return view('Admin.createOrgEvent')
        ->with('title', 'Create Organisation Event | Admin')
        ->with('allCategory', $allCategory)
        ->with('allOrg', $allOrg);

    }

    public function CreateOrgEvent(Request $request){

        $validator = Validator::make($request->all(), [
            'org_id' => 'required',
            'event_name' => 'required|min:5',
            'event_details' => 'required',
            'event_category' => 'required',
            'event_amount' => 'required',
            'date' => 'required',
            'event_phone' => 'required|min:11|max:15',
            'image' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        }else{

            $image = $request->file('image');
            $image_name=$image->getClientOriginalName();
            $image_ext=$image->getClientOriginalExtension();
            $image_new_name =strtoupper(Str::random(6));
            $image_full_name=$image_new_name.'.'.$image_ext;
            $upload_path='images/event/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $imageData='/images/event/'.$image_full_name;
            
            $data=array();
            $data['orgId']=$request->org_id;
            $data['event_name']=$request->event_name;
            $data['image']=$imageData;
            $data['details']=$request->event_details;
            $data['contact']=$request->event_phone;
            $data['eventCategory']=$request->event_category;
            $data['eventType']='1';
            $data['targetMoney']=$request->event_amount;
            $data['targetDate']=$request->date;
            $data['status']=$request->status;

            $insert = DB::table('events')->insert($data);

            if($insert){
                return redirect()->back()->with([
                    'error' => false,
                    'message' => 'Create Successfully'
                ]);
            }else{
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'Something going wrong'
                ]);
            }
        }
    }

    public function CreateVolunteerIndex(Request $request){

        $validator = Validator::make($request->all(), [
            'event_name' => 'required|min:5',
            'event_details' => 'required',
            'event_category' => 'required',
            'event_vanue' => 'required',
            'date' => 'required',
            'event_phone' => 'required|min:11|max:15',
            'image' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        }else{

            $image = $request->file('image');
            $image_name=$image->getClientOriginalName();
            $image_ext=$image->getClientOriginalExtension();
            $image_new_name =strtoupper(Str::random(6));
            $image_full_name=$image_new_name.'.'.$image_ext;
            $upload_path='images/event/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $imageData='/images/event/'.$image_full_name;
            
            $data=array();
            $data['event_name']=$request->event_name;
            $data['image']=$imageData;
            $data['details']=$request->event_details;
            $data['contact']=$request->event_phone;
            $data['eventCategory']=$request->event_category;
            $data['eventType']='2';
            $data['targetMoney']=$request->event_amount;
            $data['targetDate']=$request->date;
            $data['status']=$request->status;
            $data['isAdminEvent']='1';

            $insert = DB::table('events')->insert($data);

            if($insert){
                return redirect()->back()->with([
                    'error' => false,
                    'message' => 'Create Successfully'
                ]);
            }else{
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'Something going wrong'
                ]);
            }
        }
    }

    public function VolunteerIndex(Request $request){

        $allCategory = DB::table('event_categorys')
        ->where('status', 1)
        ->get();

        return view('Admin.createVolunteerEvent')
        ->with('title', 'Create Volunteer Event | Admin')
        ->with('allCategory', $allCategory);

    }
    
}
