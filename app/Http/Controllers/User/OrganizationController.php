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



        $organization = Organization::find($id);

        $user_id = $req->session()->get('user_id');

        



        $followOrganization = new Org_follow;
       
        $followOrganization->org_id = $organization->user_id;
        $followOrganization->user_id = $user_id;
        $followOrganization->status = $organization->status;
        $followOrganization->save();

        
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
