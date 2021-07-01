<?php

namespace App\Http\Controllers\Org;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Event;
use App\spo_to_org_proposal;

class OrganizationHomeController extends Controller
{
    public function index(){
        $Events = DB::table('events')->where('eventType','1')->get();
         return view('Organization.EventList')
            ->with('title', 'Event List | Organization')
            ->with('EventList',$Events);
           
    }
    
    public function indexVolunteer(){
        $VolEvents = DB::table('events')->where('eventType','2')->get();
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
        'event_image' =>'required',
        'contact'=>'required|min:11|max:15'
        
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
            $data['contact'] =$req->contact;
            $data['orgId'] = $req->session()->get('org_id');

            

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
public function edit($id,$type){
    return view('Organization.EditEvent')
    ->with('type', $type)
    ->with('title', 'Event List | Organization');
    
}
public function update(Request $req, $id,$type){
    $Event = Event::find($id);
    $Event->event_name = $req->event_name;
    $Event->targetDate = $req->event_end_date;
    $Event->details = $req->event_details;
    $Event->targetMoney = $req->event_amount;
    $Event->venue = $req->event_venue;
    $Event->save();
    if($type==1){
        return redirect()->route('org.eventList');
    }else{
        return redirect()->route('org.volunteereventList');
        
        
    }
    
    
}
Public function delete($id)
{   
    $Event = Event::find($id);
    return view('Organization.DeleteEvent')
    ->with('title', 'Delete Event | Organization')
    ->with('Event',$Event);
}
Public function destroy($id,$type){
    Event::destroy($id);
   if($type==1){
        return redirect()->route('org.eventList');
    }else{
        return redirect()->route('org.volunteereventList');
        
        
    }
}

public function createVolunteerEvent(Request $req){
    $validator = Validator::make($req->all(), [
        'event_name' =>'required|min:3|max:30',
        'event_details' =>'required',
        'event_type' =>'required',
        'event_image' =>'required',
        'event_venue' => 'required',
        'contact'=>'required|min:11|max:15'
        
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
            $data['eventType']='2';
            $data['eventCategory']= 'volunteer';
            $data['contact'] =$req->contact;
            $data['orgId'] = '1';



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

public function reqsponsor(Request $req){
    // $srequest = DB::table('spo_to_org_proposals')
    //                     ->where('org_Id',$req->session()->get('org_id'))
    //                     ->where('status','2')->get();
    $srequest = DB::table('spo_to_org_proposals')
    ->leftJoin('sponsors','spo_to_org_proposals.sponsor_id','=' , 'sponsors.id')
    ->select('spo_to_org_proposals.*', 'sponsors.name')
    ->where('org_Id',$req->session()->get('org_id'))
    ->where('spo_to_org_proposals.status','2')->get();
    return view('Organization.SponsorRequest')
            ->with('Requests',$srequest)
            ->with('title', 'Sponsor Requests | Organization');
}
public function approvesponsor(Request $req,$id){
    $srequest = spo_to_org_proposal::find($id);
    $srequest->status = '0';
    $srequest->save();
    return redirect()->route('org.req'); 

}
public function sponsorlist(Request $req){
    $srequest = DB::table('spo_to_org_proposals')
    ->leftJoin('sponsors','spo_to_org_proposals.sponsor_id','=' , 'sponsors.id')
    ->select('spo_to_org_proposals.*', 'sponsors.name')
    ->where('org_Id',$req->session()->get('org_id'))
    ->where('spo_to_org_proposals.status','0')->get();
     return view('Organization.SponsorList')
             ->with('Requests',$srequest)
            ->with('title', 'SponsorList | Organization');

}

public function cancelDeal(Request $req,$id){
    $srequest = spo_to_org_proposal::find($id);
    $srequest->status = '1';
    $srequest->save();
    return redirect()->route('org.sponsor'); 

}
public function renewsponsor(Request $req){
    $srequest = DB::table('spo_to_org_proposals')
                        ->where('org_Id',$req->session()->get('org_id'))
                        ->where('status','1')->get();

    return view('Organization.RenewSponsor')
            ->with('Requests',$srequest)
            ->with('title', 'Sponsor Requests | Organization');
}

public function renew(Request $req,$id){
    $srequest = spo_to_org_proposal::find($id);
    $srequest->status = '0';
    $srequest->save();
    return redirect()->route('org.renewsponsorlist'); 

}


public function sponsorTransaction(Request $req){
    // $transaction = DB::table('sponsor_trans_lists')
    //                     ->where('org_Id',$req->session()->get('org_id'))
    //                     ->where('status','0')->get();
    $transaction = DB::table('sponsor_trans_lists')
    ->leftJoin('sponsors','sponsor_trans_lists.sponsor_id','=' , 'sponsors.id')
    ->select('sponsor_trans_lists.*', 'sponsors.name')
    ->where('org_Id',$req->session()->get('org_id'))
    ->get();                    
    

    return view('Organization.sponsortransaction')
             ->with('Transaction',$transaction)
            ->with('title', 'Sponsor Transactions | Organization');

}
public function VolunteerList(Request $req){
     $vol = DB::table('event_volunteers')
                        ->where('org_Id',$req->session()->get('org_id'))
                        ->where('status','1')->get();
    
    return view('Organization.VolunteerList')
                ->with('vol',$vol)
                ->with('title', ' Volunteer List | Organization');
}
public function eventTransaction(Request $req){
     $transaction = DB::table('event_trans_lists')
                        ->where('org_Id',$req->session()->get('org_id'))
                        ->where('status','1')->get();
    
    return view('Organization.TransitionEventList')
                ->with('Transaction',$transaction)
                ->with('title', ' Event Transactions | Organization');
}

}