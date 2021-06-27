<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Event;
class OrganizationHomeController extends Controller
{
    public function index(){
        $Events = DB::table('events')->where('eventType','1')->get();
         return view('Organization.EventList')
            ->with('title', 'Event List | Organization')
            ->with('EventList',$Events);
           
}
    public function indexVolunteer(){
        $VolEvents = DB::table('events')->where('eventType','0')->get();
        return view('Organization.ManageVolunteerEvent')
                ->with('title','Volunteer Events | Organization')
                ->with('EventList',$VolEvents);
    }
 public function create(Request $req){
    $validator = Validator::make($req->all(), [
        'event_name' =>'required|min:3|max:30',
        'event_amount' =>'required',
        'event_details' =>'required',
        'event_Category' =>'required',
        'event_type' =>'required',
        'event_image' =>'required'
        
        ]);
        if($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        }
        else{
            // $eventName = $req->input('event_name');
            $image = $req->file('event_image');
            $image_name=$image->getClientOriginalName();
            $image_ext=$image->getClientOriginalExtension();
            $image_new_name =strtoupper(Str::random(6));
            $image_full_name=$image_new_name.'.'.$image_ext;
            $upload_path='images/event/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $imageData='/images/event/'.$image_full_name;



            $data=array();
            $data['event_name']=$req->event_name;
            $data['targetDate']=$req->event_end_date;
            $data['targetMoney']=$req->event_amount;
            $data['details']=$req->event_details;
            $data['eventCategory']=$req->event_Category;
            $data['image']=$imageData;
            $data['eventType']='1';
            

            $insert_event = DB::table('events')->insert($data);
            if($insert_event){
                return redirect()->back()->with([
                    'error' => false,
                    'message' => 'User Create Successfully'
                ]);
            }else{
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'Something going wrong'
                ]);
            }
            

        }
        
           
}
public function edit(){
    return view('Organization.EditEvent')->with('title', 'Event List | Organization');
    
}
public function update(Request $req, $id){
    $Event = Event::find($id);
    $Event->event_name = $req->event_name;
    $Event->targetDate = $req->event_end_date;
    $Event->details = $req->event_details;
    $Event->eventType = $req->type;
    $Event->save();
    return redirect()->route('org.eventList');
    
}
Public function delete($id)
{   
    $Event = Event::find($id);
    return view('Organization.DeleteEvent')
    ->with('title', 'Delete Event | Organization')
    ->with('Event',$Event);
}
Public function destroy($id){
    Event::destroy($id);
    return redirect()->route('org.eventList');
}

public function createVolunteerEvent(Request $req){
    $validator = Validator::make($req->all(), [
        'event_name' =>'required|min:3|max:30',
        'event_details' =>'required',
        'event_type' =>'required',
        'event_image' =>'required',
        'event_venue' => 'required'
        
        
        ]);
        if($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        }
        else{
            // $eventName = $req->input('event_name');
            $image = $req->file('event_image');
            $image_name=$image->getClientOriginalName();
            $image_ext=$image->getClientOriginalExtension();
            $image_new_name =strtoupper(Str::random(6));
            $image_full_name=$image_new_name.'.'.$image_ext;
            $upload_path='images/event/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $imageData='/images/event/'.$image_full_name;



            $data=array();
            $data['event_name']=$req->event_name;
            $data['targetDate']=$req->event_end_date;
            $data['details']=$req->event_details;
            $data['image']=$imageData;
            $data['eventType']='0';
            $data['eventCategory']= 'volunteer';
            


            $insert_event = DB::table('events')->insert($data);
            if($insert_event){
                return redirect()->back()->with([
                    'error' => false,
                    'message' => 'User Create Successfully'
                ]);
            }else{
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'Something going wrong'
                ]);
            }
            

        }
        
           
}

}