<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->type == "正式生"){
			$homeworks = DB::table('homeworks')->where('type','0')
        	->select(
    			'id', 
    			'weight',
    			'start_at',
    			'finish_at'
    		)->get();
        	$HWname=["無","作業一","作業二","作業三","作業四","作業五","作業六","期末作業"];
            $score = DB::table('scores')->where('userId',Auth::user()->uid)->select(
                    'hwId as hw',
                    'hwScore as Score'
                )->pluck('Score', 'hw');
  
            return view('std.home',[
			    'homeworks' => $homeworks,
                'HWname' => $HWname,
				'scores' => $score,
			]);
        }else{
            $users = DB::table('users')->where('type','正式生')->select('name', 'uid')->get();

            for ($i=0;$i<7;$i++) { 
                $HW[$i] = DB::table('scores')->where('hwId',$i+1)->select(
                    'userId as UID', 
                    'hwScore as Score'
                )->pluck('Score', 'UID');
            }
            $avg = DB::table('scores')->select(
                'userId as UID', 
                DB::raw('round(avg(hwScore),1) as AVG')
            )->groupBy('userId')->pluck('AVG', 'UID');

            return view('ta.home',[
                'users' => $users,
                'scores' => $HW,
                'avg' => $avg
            ]);
        }
        //return view('home');
    }

    public function profile(){
        return view('profile');
    }
}