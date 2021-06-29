<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function Index(Request $request){

        $ip = $this->getIp();
        $checkIp=DB::table('site_unique_traficIp')->where('user_ip',$ip)->get();
        $getLastCount = DB::table('sitealltrafic')->first();
        $data=array();
        $data['count']=$getLastCount->count+1;
        DB::table('sitealltrafic')->where('id', $getLastCount->id)->update($data);
        if(count($checkIp)==0){
            $data1=array();
            $data1['user_ip']=$ip;
            
            DB::table('site_unique_traficIp')->insert($data1);
        }

        $allCategory = DB::table('event_categorys')->where('status',1)->inRandomOrder()->get();

        $banner = DB::table('sponsor_banners')->where('status',1)->first();

        $totalMoneyCollect = DB::table('event_trans_lists')->where('status',1)->sum('amount');
        $totalEvents = DB::table('events')->where('status', 1)->get();
        $totalVolunteers = DB::table('event_volunteers')->where('status', 1)->get();

        $featureEvents = DB::table('events')
        ->where('status', 1)
        ->where('is_feature',1)
        ->inRandomOrder()
        ->limit(3)->get();

        return view('Home.index')
            ->with('title', 'Home')
            ->with('allCategory', $allCategory)
            ->with('featureEvents', $featureEvents)
            ->with('banner', $banner)
            ->with('totalMoneyCollect', $totalMoneyCollect)
            ->with('totalEvents', count($totalEvents))
            ->with('totalVolunteers', count($totalVolunteers));

    }

    public function contact(Request $request){

        $ip = $this->getIp();
        $checkIp=DB::table('site_unique_traficIp')->where('user_ip',$ip)->get();
        $getLastCount = DB::table('sitealltrafic')->first();
        $data=array();
        $data['count']=$getLastCount->count+1;
        DB::table('sitealltrafic')->where('id', $getLastCount->id)->update($data);
        if(count($checkIp)==0){
            $data1=array();
            $data1['user_ip']=$ip;
            
            DB::table('site_unique_traficIp')->insert($data1);
        }

        $allCategory = DB::table('event_categorys')->where('status',1)->get();
        

        return view('Home.contact')
            ->with('title', 'Contact Us')
            ->with('allCategory', $allCategory);

    }

    public function FAQ(Request $request){

        $ip = $this->getIp();
        $checkIp=DB::table('site_unique_traficIp')->where('user_ip',$ip)->get();
        $getLastCount = DB::table('sitealltrafic')->first();
        $data=array();
        $data['count']=$getLastCount->count+1;
        DB::table('sitealltrafic')->where('id', $getLastCount->id)->update($data);
        if(count($checkIp)==0){
            $data1=array();
            $data1['user_ip']=$ip;
            
            DB::table('site_unique_traficIp')->insert($data1);
        }

        $allCategory = DB::table('event_categorys')->where('status',1)->get();
        

        return view('Home.faq')
            ->with('title', 'faq')
            ->with('allCategory', $allCategory);

    }

    public function about(Request $request){

        $ip = $this->getIp();
        $checkIp=DB::table('site_unique_traficIp')->where('user_ip',$ip)->get();
        $getLastCount = DB::table('sitealltrafic')->first();
        $data=array();
        $data['count']=$getLastCount->count+1;
        DB::table('sitealltrafic')->where('id', $getLastCount->id)->update($data);
        if(count($checkIp)==0){
            $data1=array();
            $data1['user_ip']=$ip;
            
            DB::table('site_unique_traficIp')->insert($data1);
        }

        $allCategory = DB::table('event_categorys')->where('status',1)->get();
        

        return view('Home.about')
            ->with('title', 'About Us')
            ->with('allCategory', $allCategory);

    }

    public function EventDetails(Request $request,$id){

        $ip = $this->getIp();
        $checkIp=DB::table('site_unique_traficIp')->where('user_ip',$ip)->get();
        $getLastCount = DB::table('sitealltrafic')->first();
        $data=array();
        $data['count']=$getLastCount->count+1;
        DB::table('sitealltrafic')->where('id', $getLastCount->id)->update($data);
        if(count($checkIp)==0){
            $data1=array();
            $data1['user_ip']=$ip;
            
            DB::table('site_unique_traficIp')->insert($data1);
        }
        $id = base64_decode($id);
        $allCategory = DB::table('event_categorys')->where('status',1)->get();
        
        $Events = DB::table('events')
        ->where('id', $id)->first();

        $data1=array();
        $data1['visitor']=$Events->visitor+1;
        DB::table('events')->where('id', $id)->update($data1);

        $trnsList = DB::table('event_trans_lists')
        ->leftJoin('events', 'event_trans_lists.eventId', '=', 'events.id')
        ->leftJoin('userinfos', 'event_trans_lists.user_id', '=', 'userinfos.id')
        ->select('event_trans_lists.*', 'events.event_name','userinfos.name')
        ->where('eventId', $id)->orderBy('id','DESC')->get();

        $volunteersList = DB::table('event_volunteers')
        ->leftJoin('events', 'event_volunteers.eventId', '=', 'events.id')
        ->select('event_volunteers.*', 'events.event_name')
        ->where('eventId', $id)->orderBy('event_volunteers.id','DESC')->get();
        
        $totalCollect = DB::table('event_trans_lists')
        ->where('eventId', $id)->sum('amount');

        $totalVApply= DB::table('event_volunteers')
        ->where('eventId', $id)->get();

        return view('Home.EventDetails')
            ->with('title', 'EventDetails Us')
            ->with('allCategory', $allCategory)
            ->with('trnsList', $trnsList)
            ->with('volunteersList', $volunteersList)
            ->with('totalCollect', $totalCollect)
            ->with('Events', $Events)
            ->with('totalVApply', count($totalVApply));

    }

    public function Events(Request $request){

        $ip = $this->getIp();
        $checkIp=DB::table('site_unique_traficIp')->where('user_ip',$ip)->get();
        $getLastCount = DB::table('sitealltrafic')->first();
        $data=array();
        $data['count']=$getLastCount->count+1;
        DB::table('sitealltrafic')->where('id', $getLastCount->id)->update($data);
        if(count($checkIp)==0){
            $data1=array();
            $data1['user_ip']=$ip;
            
            DB::table('site_unique_traficIp')->insert($data1);
        }

        $allCategory = DB::table('event_categorys')->where('status',1)->get();

        $allEvents = DB::table('events')
        ->where('status', 1)
        ->where('eventType',1)
        ->where('eventType',1)
        ->inRandomOrder()
        ->paginate(9);

        // $allEvents = DB::table('events')
        // ->leftJoin('event_trans_lists', 'events.id', '=', 'event_trans_lists.eventId')
        // ->select('events.*', 'event_trans_lists.*')
        // ->where('events.status', 1)
        // ->where('events.eventType',1)
        // ->inRandomOrder()
        // ->paginate(9);

        // dd( $allEvents);
        $volEvents = DB::table('events')
        // ->leftJoin('events', 'event_volunteers.eventId', '=', 'events.id')
        ->where('status', 1)
        ->where('eventType',2)
        ->inRandomOrder()
        ->get();

        return view('Home.events')
            ->with('title', 'Events')
            ->with('allCategory', $allCategory)
            ->with('allEvents', $allEvents)
            ->with('volEvents', $volEvents);

    }

    public function CategoryEvent(Request $request,$cat_id){

        $ip = $this->getIp();
        $checkIp=DB::table('site_unique_traficIp')->where('user_ip',$ip)->get();
        $getLastCount = DB::table('sitealltrafic')->first();
        $data=array();
        $data['count']=$getLastCount->count+1;
        DB::table('sitealltrafic')->where('id', $getLastCount->id)->update($data);
        if(count($checkIp)==0){
            $data1=array();
            $data1['user_ip']=$ip;
            
            DB::table('site_unique_traficIp')->insert($data1);
        }

        $cat_id = base64_decode($cat_id);

        $allCategory = DB::table('event_categorys')->where('status',1)->get();

        $allEvents = DB::table('events')
        ->where('eventType',1)
        ->where('eventCategory',$cat_id)
        ->where('status', 1)
        ->inRandomOrder()
        ->paginate(9);

        $volEvents = DB::table('events')
        ->where('status', 1)
        ->where('eventType',2)
        ->where('eventCategory',$cat_id)
        ->inRandomOrder()
        ->get();

        return view('Home.CategoryEvents')
            ->with('title', 'Category Event')
            ->with('allCategory', $allCategory)
            ->with('allEvents', $allEvents)
            ->with('volEvents', $volEvents);

    }

    public function Organization(Request $request){

        $ip = $this->getIp();
        $checkIp=DB::table('site_unique_traficIp')->where('user_ip',$ip)->get();
        $getLastCount = DB::table('sitealltrafic')->first();
        $data=array();
        $data['count']=$getLastCount->count+1;
        DB::table('sitealltrafic')->where('id', $getLastCount->id)->update($data);
        if(count($checkIp)==0){
            $data1=array();
            $data1['user_ip']=$ip;
            
            DB::table('site_unique_traficIp')->insert($data1);
        }

        $allCategory = DB::table('event_categorys')->where('status',1)->get();
        $allOrg = DB::table('organizations')
        ->where('status', 1)
        ->paginate(9);

        return view('Home.Organization')
            ->with('title', 'Organization')
            ->with('allCategory', $allCategory)
            ->with('allOrg', $allOrg);


    }

    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip);
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip();
    }
}
