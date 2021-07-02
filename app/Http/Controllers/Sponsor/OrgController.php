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
    public function applyInOrg(Request $request){

        $userId = $request->session()->get('user_id');

        $sp = DB::table('sponsors')
        ->where('user_id',$userId)
        ->where('status',1)
        ->first();

        $validator = Validator::make($request->all(), [
            'advertise_title' => 'required|min:5',
            'image' => 'required'
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
            $upload_path='images/Sponsor/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $imageData='images/Sponsor/'.$image_full_name;

            
            $data=array();
            $data['title']=$request->advertise_title;
            $data['image']=$imageData;
            $data['sponsor_Id']=$sp->id;
            $data['status']='2';

            $insert = DB::table('sponsor_banners')->insert($data);

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
}
