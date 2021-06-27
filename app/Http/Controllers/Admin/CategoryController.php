<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function Index(Request $request){

        $allCategory = DB::table('event_categorys')->get();

        return view('Admin.EventCategory')
        ->with('title', 'Event Category | Admin')
        ->with('allCategory', $allCategory);

    }

    public function CreateCategory(Request $request){

        $validator = Validator::make($request->all(), [
            'category_name' => 'required|min:3|max:20',
            'category_status' => 'required',
            'name' => 'unique:event_categorys'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        }else{

            $check = DB::table('event_categorys')->where('name',$request->category_name)->first();

            if($check ){
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'Already use this category name'
                ]);
            }else{
                $data=array();
                $data['name']=$request->category_name;
                $data['status']=$request->category_status;
    
                $insert = DB::table('event_categorys')->insert($data);
    
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

            $update= DB::table('event_categorys')
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

    public function Delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cat_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        } else {
            $id = $request->input('cat_id');

            $removed=DB::table('event_categorys')->where('id', $id)->delete();

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
}
