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
			$submit = DB::table('submits')->where('userId',Auth::user()->uid)->select(
                    'hwId as hw',
                    'practice as Practice'
                )->pluck('Practice', 'hw');
            $subtime = DB::table('submits')->where('userId',Auth::user()->uid)->select(
                    'hwId as hw',
					'created_at as Create'
                )->pluck( 'Create','hw'); 
			$subupdate = DB::table('submits')->where('userId',Auth::user()->uid)->select(
                    'hwId as hw',
					'updated_at as Update'
                )->pluck( 'Update','hw'); 
			$subchoice = DB::table('submits')->where('userId',Auth::user()->uid)->select(
                    'hwId as hw',
					'choice as Choice'
                )->pluck( 'Choice','hw');
            return view('std.home',[
			    'homeworks' => $homeworks,
                'HWname' => $HWname,
				'scores' => $score,
				'create' => $subtime,
				'update' => $subupdate,
				'choice' => $subchoice,
				'submit' =>$submit,
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
        return view('layouts.profile');
    }

    public function edit(){
        return view('layouts.profileForm');
    }

    public function update(Request $request){

        try{
            $destinationPath = public_path().'/img/std/';
            if($request->stdFile) $filetype = $request->stdFile->getMimeType();
            else $filetype = 'image/png';
            
            if($filetype == 'application/jpeg') $fType = ".jpg";
            else if($filetype == 'image/jpeg') $fType = ".jpeg";
            else if($filetype == 'image/png') $fType = ".png";
            else return "檔案格式錯誤";

            //return $filetype;
            $unique_name = Auth::user()->uid.$fType;
            if($request->stdFile){
                $request->file('stdFile')->move($destinationPath,$unique_name);
                $request->stdFile = Auth::user()->uid.$fType;
            }else{
                $request->stdFile = Auth::user()->path;
            }

            DB::table('users')->where('uid', Auth::user()->uid)->update([
                'path' => $request->stdFile, 
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return redirect('/profile');
        }catch (\Exception $e){
            return "發生錯誤";
        }
    }
}