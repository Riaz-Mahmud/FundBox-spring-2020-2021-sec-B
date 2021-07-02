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

class UserController extends Controller
{

    private function isLoggedIn(Request $request){
        if ($request->session()->has('user_type') && $request->session()->get('user_type')) {
            return true;
        } else {
            
            return false;
        }
        return true;
    }

    public function CreateAdmin(Request $request){

        $validator = Validator::make($request->all(), [
            'admin_name' => 'required|min:3|max:30',
            'username' => 'required|string',
            'admin_email' => 'required|email|min:10|max:50',
            'admin_password' => 'required|min:8|max:20',
            'admin_confirm_assword' => 'required|same:admin_password',
            'admin_phone' => 'required|min:11|max:15',
            'status' => 'required',
            'admin_image' => 'required',
            'username' => 'unique:userinfos',
            'email' => 'unique:userinfos'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        }else{

            $image = $request->file('admin_image');
            $image_name=$image->getClientOriginalName();
            $image_ext=$image->getClientOriginalExtension();
            $image_new_name =strtoupper(Str::random(6));
            $image_full_name=$image_new_name.'.'.$image_ext;
            $upload_path='images/admin/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $imageData='/images/admin/'.$image_full_name;

            
            $data=array();
            $data['name']=$request->admin_name;
            $data['username']=$request->username;
            $data['password']=md5($request->admin_password);
            $data['image']=$imageData;
            $data['email']=$request->admin_email;
            $data['phone']=$request->admin_phone;
            $data['type']='1';
            $data['status']=$request->status;

            $insert_user = DB::table('userinfos')->insert($data);

            if($insert_user){
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

    public function ManageAdmin(Request $request){

        $allAdmins = DB::table('userinfos')
        ->where('type', 1)
        ->get();

        return view('Admin.ManageAdmin')
        ->with('title', 'Manage Admin | Admin')
        ->with('allAdmins', $allAdmins);
    }

    public function UpdateStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'user_status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        } else {
            $user_id = $request->input('user_id');
            
            $data=array();
            $data['status']=$request->input('user_status');

            $update= DB::table('userinfos')
                            ->where('id',$user_id)
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

    public function UpdateUserInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'editUser_id' => 'required',
            'editName' => 'required|string',
            'editEmail' => 'required|email|min:10|max:50',
            'editPhone' => 'required|min:11|max:15',
            'email' => 'unique:userinfos'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
            
        } else {
            $user_id = $request->input('editUser_id');
            
            $data=array();
            $data['name']=$request->input('editName');
            $data['email']=$request->input('editEmail');
            $data['phone']=$request->input('editPhone');
            

            $update= DB::table('userinfos')
                            ->where('id',$user_id)
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

    public function DeleteAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'adminId' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        } else {
            $user_id = $request->input('adminId');

            $removed=DB::table('userinfos')->where('id', $user_id)->delete();

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

    public function MakeSuperAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'value' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        } else {
            $user_id = $request->input('user_id');
            
            $data=array();
            $data['is_super_admin']=$request->input('value');

            $update= DB::table('userinfos')
                            ->where('id',$user_id)
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

    public function ManageProfile(Request $request){

        $UserInfo = DB::table('userinfos')
        ->where('id',$request->session()->get('user_id'))
        ->where('type', 1)
        ->first();

        return view('Admin.ManageAccount')
        ->with('title', 'Create Admin | Admin')
        ->with('UserInfo', $UserInfo);
    }

    public function ManageProfileUpdate(Request $request)
    {
        if ($this->isLoggedIn($request)) {
            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'email' => 'required',
                'name' => 'required',
                'phone' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'Required data missing.'
                ]);
            } else {
                $data=array();
                $data['name']=$request->input('name');
                $data['phone']=$request->input('phone');


                if($request->password !=""){
                    if($request->password == $request->con_pass){
                        $data['password']=md5($request->password);
                    }
                }

                $userAvailable= DB::table('userinfos')
                ->where('id',$request->session()->get('user_id'))
                ->where('username',$request->input('username'))
                ->where('email',$request->input('email'))
                ->first();
                // dd($request->all());
                if($userAvailable){
                    
                    if($request->update_image !=""){
                        $image = $request->file('update_image');
                        $image_name=$image->getClientOriginalName();
                        $image_ext=$image->getClientOriginalExtension();
                        $image_new_name =strtoupper(Str::random(6));
                        $image_full_name=$image_new_name.'.'.$image_ext;
                        $upload_path='images/admin/';
                        $image_url=$upload_path.$image_full_name;
                        $success=$image->move($upload_path,$image_full_name);
                        $imageData='/images/admin/'.$image_full_name;

                        $data['image']=$imageData;
                    }

                    $data=DB::table('userinfos')->where('id',$request->session()->get('user_id'))->update($data);
                    
                    if($data==null){
                        return redirect()->back()->with([
                            'error' => true,
                            'message' => 'Something went wrong.'
                        ]);
                    }
                    else{
                        return redirect()->back()->with([
                            'error' => false,
                            'message' => 'Update successfully.'
                        ]);
                    } 

                }else{
                    return redirect('/logout');
                }
            }
        } else {
            return redirect('/SignIn');
        }
    }

    public function ManageProfileDeactivated(Request $request)
    {
        if ($this->isLoggedIn($request)) {

            $data=array();
            $data['status']='0';

            $update= DB::table('userinfos')
                ->where('id',$request->session()->get('user_id'))
                ->update($data);

            if ($update) {
                return redirect('/logout');
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Something went wrong.'
                ]);
            }
        }else{
            return redirect(url('/SignIn'));
        }
    }
    
}
