<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Report;
use App\Event;
use App\Review;
use App\Event_volunteer;
use App\Http\Requests\ReportRequest;

class UserController extends Controller
{
    public function transitionDetails(Request $req){
        
        $transitionList = DB::table('event_trans_lists')->get();
        //$req->session()->put('user_id',16);
        $user_id = $req->session()->get('user_id');
       
        return view('User.TransitionDetails')->with('transitionList',  $transitionList)
                                               ->with('user_id', $user_id)
                                               ->with('title', 'Transition List');
       
    
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
