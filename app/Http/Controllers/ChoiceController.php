<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;

class ChoiceController extends Controller
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
    		return url('/home');
    	}else{
    		$choices = DB::table('choices')->select(
    			'chapter', 
    			'topic',
    			'ans',
    			'question'
    		)->get();
    		$chName = ["無","一","二","三","四","五","六"];
    		$chAns = ["X","A","B","C","D"];

    		return view('ta.choice',[
                'choices' => $choices,
                'chName' => $chName,
                'chAns' => $chAns,
            ]);
    	}
    }
}
