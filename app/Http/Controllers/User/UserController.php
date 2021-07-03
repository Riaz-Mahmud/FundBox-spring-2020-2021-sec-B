<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Report;
use App\Event;
use App\Review;
use App\Event_trans_list;
use App\User;
use App\Event_volunteer;
use App\Http\Requests\ReportRequest;
use App\Http\Requests\EditProfileRequest;
use PDF;

class UserController extends Controller
{
    public function generateInvoice(Request $req, $id){

       $user_id = $req->session()->get('user_id');
       $user_email = $req->session()->get('user_email');
       $user_name = $req->session()->get('full_name');
       
      
       $transition = Event_trans_list::where('id',$id)->first();

       $data = [
        'transition' =>  $transition,
        'user_email' =>  $user_email,
        'user_name' =>  $user_name,
        'user_id' =>  $user_id,
       
        
    ];
    $pdf = PDF::loadView('User.Invoice', $data);

    return $pdf->download('fundbox.pdf');
      
       
       
    
    }
    public function transitionDetails(Request $req){
        
        $transitionList = DB::table('event_trans_lists')->get();
        
        $user_id = $req->session()->get('user_id');

       
       
        return view('User.TransitionDetails')->with('transitionList',  $transitionList)
                                               ->with('user_id',  $user_id)
                                               ->with('title', 'Transition List');
       
    
    }
    public function editProfile(Request $req){
        
        return view('User.EditProfile')->with('title', 'Edit Profile');
       
    
       
    
    }
    public function editProfileGetData(Request $req){
        
        return User::all();
       
    
    }
    public function editProfileStoreData(EditProfileRequest $req){
        
        $user = new User;
      
        $user->name =$req->edited_name; ;
        $user->username  =$req->edited_username;
        $user->password = $req->edited_password;
        $user->email =$req->edited_email;
        $user->phone =$req->edited_phone;
        $user->save();

        return ['success'=>true,'message'=>'Updated Successfully'];
 
       
    
    }
    public function editProfileUpdateData(EditProfileRequest $req){

        $user_id = $req->session()->get('user_id');

        $user = User::find($user_id);

        $user->name =$req->edited_name; ;
        $user->username  =$req->edited_username;
        $user->password = $req->edited_password;
        $user->email =$req->edited_email;
        $user->phone =$req->edited_phone;
        $user->save();
        
        return ['success'=>true,'message'=>'Updated Successfully'];
    
    }
    public function applyVolunteerEvent(Request $req){
        
     
        return view('/user/applyVolunteerEvent')->with('title', 'Apply Volunteer Event');
                                               
       
    
    }
    public function dashboard(Request $req){

        $events = Event::all();
        
     
        return view('User.Home')->with('title', 'User Home Page')
                                   ->with('Events',$events);            
        
    
    }
    public function reportReply(Request $req){

        $Reports = Report::all();

        $user_id=$req->session()->get('user_id');
        
     
        return view('User.ReportReply')->with('title', ' Reports Reply and Details')
                                   ->with('user_id',$user_id)           
                                   ->with('Reports',$Reports);            
        
    
    }
    public function yourAppliedVolunteerEvents(Request $req){

        
       $user_id = $req->session()->get('user_id');

       $Event = Event::join('event_volunteers', 'event_volunteers.eventId', '=' ,'events.id')
                       ->where('event_volunteers.user_id',$user_id)
                        ->get();

      
        // $VEvents_id = Event_volunteer::where('user_id',$user_id)->get(['eventId']);
       
       
        // $Event = Event::where('id',$VEvents_id)->get();
 
        return view('User/YourAppliedVolunteerEvents')->with('volunteerEvents', $Event)
                                                     ->with('title', 'Applied Volunteer Events');
       
                                               
       
    
    }
    public function cancleVolunteerEvent(Request $req, $id){



        
       
        Event_volunteer::destroy($id);


        $user_id = $req->session()->get('user_id');

       $Event = Event::join('event_volunteers', 'event_volunteers.eventId', '=' ,'events.id')
                       ->where('event_volunteers.user_id',$user_id)
                        ->get();
        
        return view('User/YourAppliedVolunteerEvents')->with('volunteerEvents', $Event)
                                                     ->with('title', 'Applied Volunteer Events');
    
    }







    public function report(Request $req, $id){
        
        
        $user_id = $req->session()->get('user_id');
        

        
        
        return view('User.Report')->with('title', 'Report')
                                  ->with('event_id',$id)
                                  ->with('user_id',$user_id);
        
       
    
    }
    public function review(Request $request , $id){

        $user_id = $request->session()->get('user_id');

        
        
        return view('User.Review')->with('title', 'Review')
                                  ->with('event_id',$id)
                                  ->with('user_id',$user_id);
        
       
    
    }
    public function reviewPost(ReviewRequest $request){
    
       $user_id = $request->session()->get('user_id');
        
   

        $review = new Review;
      
        $review->user_id =$user_id ;
        $review->event_id =$request->e;
        $review->message = $request->review;
        $review->status =1;
        $review->save();


        return view('User.Review')->With('event_id',$request->e)
                                   ->with('title', 'Review');



        
            
        
       
    
    }
    public function reportPost(ReportRequest $req){
        
        $report = new Report;
        $user_id = $req->session()->get('user_id');
        $username = $req->session()->get('username');

        $report->event_id = $req->e;
        $report->user_id =$user_id;
        $report->user_name = $username;
        $report->details = $req->report;
        $report->status = 1;
        $report->save();
        

        return view('User.Report')->with('title', 'Report')
                                 ->with('event_id',$req->e)
                                  ->with('user_id',$user_id);
       
    
    }


    




}
