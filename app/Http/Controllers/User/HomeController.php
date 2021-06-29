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
        $checkIp=DB::table('sitetraficip')->where('user_ip',$ip)->get();          
        if(count($checkIp)==0){
            $data=array();
            $data['user_ip']=$ip;
            
            DB::table('sitetraficip')->insert($data);
        }

        $allCategory = DB::table('event_categorys')->where('status',1)->get();
        $featureEvents = DB::table('events')
        ->where('status', 1)
        ->where('is_feature',1)
        ->inRandomOrder()
        ->limit(3)->get();

        return view('Home.index')
            ->with('title', 'Home')
            ->with('allCategory', $allCategory)
            ->with('featureEvents', $featureEvents);

    }

    public function Events(Request $request){

        $ip = $this->getIp();
        $checkIp=DB::table('sitetraficip')->where('user_ip',$ip)->get();          
        if(count($checkIp)==0){
            $data=array();
            $data['user_ip']=$ip;
            
            DB::table('sitetraficip')->insert($data);
        }

        $allCategory = DB::table('event_categorys')->where('status',1)->get();

        $allEvents = DB::table('events')
        // ->leftJoin('events', 'event_volunteers.eventId', '=', 'events.id')
        ->where('status', 1)
        ->where('eventType',1)
        ->inRandomOrder()
        ->paginate(9);
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

    public function Organization(Request $request){

        $ip = $this->getIp();
        $checkIp=DB::table('sitetraficip')->where('user_ip',$ip)->get();          
        if(count($checkIp)==0){
            $data=array();
            $data['user_ip']=$ip;
            
            DB::table('sitetraficip')->insert($data);
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
