<?php

namespace App\Http\Controllers\Sponsor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrgController extends Controller
{
    public function orgList(Request $request){

        $allOrgList = DB::table('organizations')
         ->where('status',1)
         ->get();
         //dd($orgList);

        return view('Sponsor.OrgList')
            ->with('title', 'Apply Org | Sponsor')
            ->with('allOrgList', $allOrgList);

    }
    public function sponsoredOrgList(Request $request){

        $sponsorOrgList = DB::table('spo_to_org_proposals')
         ->where('status',1)
         ->get();
         //dd($orgList);

         return view('Sponsor.SponsoredorgList')
            ->with('title', 'Sponsored Org List | Sponsor')
            ->with('sponsorOrgList', $sponsorOrgList);

    }
    public function pendingOrgList(Request $request){

        $pendingOrgList = DB::table('spo_to_org_proposals')
         ->where('status',0)
         ->get();
         //dd($orgList);

         return view('Sponsor.PendingOrgList')
            ->with('title', 'Pending Org Request | Sponsor')
            ->with('allPendingOrgList', $pendingOrgList);

    }
}
