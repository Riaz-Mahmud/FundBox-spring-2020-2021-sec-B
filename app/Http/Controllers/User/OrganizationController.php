<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Organization;
use App\Event;
use App\Org_follow;
class OrganizationController extends Controller
{
    public function organizationList(){
        $users = Organization::all();

        return view('User.OrganizationList')->with('organizationList', $users)
                                            ->with('title', 'Organization List');
    
    }


    public function organizationDetails(Request $req, $id){
        $user = Organization::find($id);

        $follow = Org_follow:: all();


        return view('User.OrganizationDetails')->with('organization', $user)
                                               ->with('followedOrganizations', $follow)
                                               ->with('title', 'Organization Details');

       
    
    }


    public function organizationEvents($id){
        $users = Event::where('orgId',$id)
                        ->get();

        return view('User.OrganizationEvents')->with('organizationEvents', $users)
                                               ->with('title', 'Organization Events');

       
    
    }
    public function organizationFollow(Request $req, $id){





        $user = Organization::find($id);

        $req->session()->put('userId',1);
        $userId = $req->session()->get('userId');

        // $req->session()->put('Id',2);
        // $Id = $req->session()->get('Id');



        $organization = new Org_follow;
        // $organization->id =$Id ;
        $organization->org_id = $user->user_id;
        $organization->user_id = $userId;
        $organization->status = $user->status;
        $organization->save();

        
        return redirect()->route('Organization.followedOrganization');

       
    
    }


    public function followedOrganization(){
        $followedOrganizations = Org_follow::all();

        return view('User.FollowedOrganization')->with('followedOrganizations', $followedOrganizations)
                                               ->with('title', 'Followed Organization');

       
    
    }



    public function unfollowedOrganization($id){
        
        Org_follow::destroy($id);
        return redirect()->route('Organization.followedOrganization');

       
    
    }




    







}
