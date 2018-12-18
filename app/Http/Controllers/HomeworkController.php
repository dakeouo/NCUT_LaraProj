<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;

class HomeworkController extends Controller
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
            return view('std.home');
        }else{
        	$homeworks = DB::table('homeworks')->where('type','0')
        	->select(
    			'id', 
    			'weight',
    			'start_at',
    			'finish_at'
    		)->get();
        	$HWname=["無","作業一","作業二","作業三","作業四","作業五","作業六","期末作業"];

           return view('ta.hw',[
                'homeworks' => $homeworks,
                'HWname' => $HWname,
            ]);
        }
        //return view('home');
    }
}
