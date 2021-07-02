<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event_volunteer;
use App\Event;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function volunteerEventList(){
        $users = Event::where('eventType',2)->get();

        return view('User.VolunteerEventList')->with('volunteerEventList', $users)
                                            ->with('title', 'Volunteer Event List');
       }
    public function events(){
        $events = Event::all();
        $eventCategorys = DB::table('event_categorys')->get();

        return view('User.Events')->with('Events', $events)
                                               ->with('eventCategorys', $eventCategorys)
                                              ->with('title', 'Event Categories');

                                  
        }
    public function search(Request $req){
       
        
        $Event=Event::where('event_name','LIKE','%'. $req->eventSearch .'%')
                        ->orWhere('details','LIKE','%'. $req->eventSearch .'%')
                        ->get();

        $eventCategorys = DB::table('event_categorys')->get();


     return view('User.Events')->with('Events', $Event)
                              ->with('eventCategorys', $eventCategorys)
                            ->with('title', 'Event Categories');


                                  
        }
    

    public function CategoryWiseEvent(Request $req){
        $events = Event::where('eventCategory',$req->selectedCategory)
                        ->get();
        $eventCategorys = DB::table('event_categorys')->get();

        return view('User.Events')->with('Events', $events)
                                               ->with('eventCategorys', $eventCategorys)
                                              ->with('title', 'Event Categories');

                                  
        }




}