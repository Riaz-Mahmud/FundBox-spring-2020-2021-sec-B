<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrganizationController extends Controller
{
    public function ShowCreatePage(Request $request){

        $allUsers = DB::table('userinfos')
        ->where('type', 4)
        ->get();

        return view('Admin.createOrg')
        ->with('title', 'Create Organisation | Admin')
        ->with('allUsers', $allUsers);

    }

    public function CreateOrganisation(Request $request){

        $validator = Validator::make($request->all(), [
            'org_name' => 'required|min:5|max:50',
            'org_details' => 'required',
            'phone' => 'required|min:11|max:15',
            'address' => 'required',
            'org_image' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        }else{

            $image = $request->file('org_image');
            $image_name=$image->getClientOriginalName();
            $image_ext=$image->getClientOriginalExtension();
            $image_new_name =strtoupper(Str::random(6));
            $image_full_name=$image_new_name.'.'.$image_ext;
            $upload_path='images/organisation/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $imageData='/images/organisation/'.$image_full_name;

            
            $data=array();
            $data['user_id']=$request->org_user;
            $data['name']=$request->org_name;
            $data['phone']=$request->phone;
            $data['image']=$imageData;
            $data['address']=$request->address;
            $data['details']=$request->org_details;
            $data['status']=$request->status;

            $insert = DB::table('organizations')->insert($data);

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

    public function ManageOrg(Request $request){

        $allOrgs = DB::table('organizations')
        ->where('status',0)
        ->orWhere('status',1)
        ->orWhere('status',2)
        ->orderBy('id','DESC')
        ->paginate(10);

        $allUsers = DB::table('userinfos')
        ->where('type', 4)
        ->get();

        return view('Admin.ManageOrg')
        ->with('title', 'Manage Organisation | Admin')
        ->with('allOrgs', $allOrgs)
        ->with('allUsers', $allUsers);

    }

    public function UpdateStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        } else {
            $id = $request->input('id');
            
            $data=array();
            $data['status']=$request->input('status');

            $update= DB::table('organizations')
                            ->where('id',$id)
                            ->update($data);

            if ($update) {
                return response()->json([
                    'error' => false,
                    'message' => 'Update successfully.'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Something went wrong.'
                ]);
            }
        }
    }

    public function UpdateInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_id' => 'required',
            'editName' => 'required|string',
            'editPhone' => 'required|min:11|max:15',
            'editAddress' => 'required',
            'edit_details' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
            
        } else {
            $id = $request->input('edit_id');

            $data=array();
            $data['name']=$request->input('editName');
            $data['phone']=$request->input('editPhone');
            $data['address']=$request->input('editAddress');
            $data['details']=$request->input('edit_details');
            

            $update= DB::table('organizations')
                            ->where('id',$id)
                            ->update($data);

                            
            if ($update) {
                return redirect()->back()->with([
                    'error' => false,
                    'message' => 'Edit successfully.'
                ]);
            } else {
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'Something went wrong.'
                ]);
            }
        }
    }

    public function AddOrgUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_orgid' => 'required',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Please Select User'
            ]);
        } else {
            $org_id = $request->input('edit_orgid');
            $user_id = $request->input('user_id');
            
            $data=array();
            $data['user_id']=$request->input('user_id');

            $data1=array();
            $data1['type']='2';

            $org_update= DB::table('organizations')
                            ->where('id',$org_id)
                            ->update($data);

            $user_update= DB::table('userinfos')
                        ->where('id',$user_id)
                        ->update($data1);

            if ($org_update && $user_update) {
                return redirect()->back()->with([
                    'error' => false,
                    'message' => 'Update Successfully'
                ]);
            } else {
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'Something went wrong.'
                ]);
            }
        }
    }

    public function Delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orgId' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        } else {
            $id = $request->input('orgId');

            $removed=DB::table('organizations')->where('id', $id)->delete();

            if ($removed) {
                return response()->json([
                    'error' => false,
                    'message' => 'Delete successfully.'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Something went wrong.'
                ]);
            }
        }
    }

    public function UpdateImage(Request $request){

        $validator = Validator::make($request->all(), [
            'editOrgImage' => 'required',
            'orgEdiImageId' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        }else{

            $image = $request->file('editOrgImage');
            $image_name=$image->getClientOriginalName();
            $image_ext=$image->getClientOriginalExtension();
            $image_new_name =strtoupper(Str::random(6));
            $image_full_name=$image_new_name.'.'.$image_ext;
            $upload_path='images/organisation/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $imageData='/images/organisation/'.$image_full_name;

            $id = $request->input('orgEdiImageId');

            $org_info=DB::table('organizations')
            ->where('id',$id)
            ->first();
            $old_image= $org_info->image;

            $data=array();
            $data['image']=$imageData;

            $org_update= DB::table('organizations')
                            ->where('id',$id)
                            ->update($data);

            if($org_update){
                if (file_exists("../public".$old_image)){
                    unlink("../public".$old_image);
                }
                return redirect()->back()->with([
                    'error' => false,
                    'message' => 'Image Update Successfully'
                ]);
            }else{
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'Something going wrong'
                ]);
            }
        }
    }

    public function BlockOrg(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orgId' => 'required',
            'value' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        } else {
            $id = $request->input('orgId');
            
            $data=array();
            $data['status']=$request->input('value');

            $update= DB::table('organizations')
                            ->where('id',$id)
                            ->update($data);

            if ($update) {
                return response()->json([
                    'error' => false,
                    'message' => 'Block successfully.'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Something went wrong.'
                ]);
            }
        }
    }

    public function PendingOrg(Request $request){

        $allOrgs = DB::table('organizations')
        ->where('status',3)
        ->orderBy('id','DESC')
        ->paginate(10);

        $allUsers = DB::table('userinfos')
        ->where('type', 4)
        ->get();

        return view('Admin.ManageOrg')
        ->with('title', 'Manage Organisation | Admin')
        ->with('allOrgs', $allOrgs)
        ->with('allUsers', $allUsers);

    }

    public function PendingOrgAccept(Request $request,$id){
        $orgId = base64_decode($id);
        
        $data=array();
        $data['status']='1';

        $update= DB::table('organizations')
            ->where('id',$orgId)
            ->update($data);

        if ($update) {
            return redirect()->back()->with([
                'error' => false,
                'message' => 'Active successfully.'
            ]);
        } else {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Something went wrong.'
            ]);
        }

    }

    public function PendingOrgDelete(Request $request,$id){
        $orgId = base64_decode($id);
        
        $removed=DB::table('organizations')->where('id', $orgId)->delete();

        if ($removed) {
            return redirect()->back()->with([
                'error' => false,
                'message' => 'Delete successfully.'
            ]);
        } else {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Something went wrong.'
            ]);
        }
    }
}
