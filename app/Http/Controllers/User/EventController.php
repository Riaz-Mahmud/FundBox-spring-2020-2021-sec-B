<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event_volunteer;

class EventController extends Controller
{
    public function volunteerEventList(){
        $users = Event_volunteer::all();

        return view('User.VolunteerEventList')->with('volunteerEventList', $users)
                                            ->with('title', 'Volunteer Event List');
}
}