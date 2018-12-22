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

    public $hwName=["請選擇...","作業一","作業二","作業三","作業四","作業五","作業六","期末作業"];
    public $hwType = ["一般","補交"];

    public function index(){

        if(Auth::user()->type == "正式生"){
            return redirect('home');
        }else{
        	$homeworks = DB::table('homeworks')->where('type','0')
        	->select(
    			'id', 
    			'weight',
    			'start_at',
    			'finish_at'
    		)->get();

            $homeworks1 = DB::table('homeworks')->where('type','1')
            ->select(
                'id', 
                'weight',
                'start_at',
                'finish_at'
            )->get();

           return view('ta.hw',[
                'homeworks' => $homeworks,
                'homeworks1' => $homeworks1,
                'hwName' => $this->hwName,
            ]);
        }
        //return view('home');
    }

    public function create(){
        if(Auth::user()->type == "正式生") return redirect('home');

        return view('ta.hwForm',[
            'title' => '新增作業項目',
            'FormType' => 'Create',
            'action' => route('homework.create'),
            'hwName' => $this->hwName,
            'hwType' => $this->hwType,
        ]);
    }

    public function store(Request $request){

        DB::table('homeworks')->insert([
            'type' => $request->hwType, 
            'id' => ($request->hwNo)+($request->hwType)*10,
            'weight' => $request->weight,
            'contect' => $request->hwText,
            'start_at' => $request->startTime,
            'finish_at' => $request->endTime,
        ]);

        return redirect('/homework');
    }

    public function edit($id){
        if(Auth::user()->type == "正式生") return redirect('home');

        $homeworks = DB::table('homeworks')->select(
            'type as hwType', 'id as hwNo','weight',
            'contect as hwText','start_at as startTime','finish_at as endTime'
        )->where('id',$id)->first();

        return view('ta.hwForm',[
            'title' => '修改作業項目',
            'FormType' => 'Edit',
            'action' => $id,
            'hwName' => $this->hwName,
            'hwType' => $this->hwType,
            'homeworks' => $homeworks,
        ]);
    }

    public function update(Request $request, $id){

        DB::table('homeworks')->where('id', $id)->update([
            'type' => $request->hwType, 
            'id' => ($request->hwNo)+($request->hwType)*10,
            'weight' => $request->weight,
            'contect' => $request->hwText,
            'start_at' => $request->startTime,
            'finish_at' => $request->endTime,
        ]);

        return redirect('/homework');
    }

    public function destroy(Request $request, $id){
        DB::table('homeworks')->where('id', $id)->delete();

        return redirect('/homework');
    }

    public function show($id){
        $hw = DB::table('homeworks')->select('id','contect')->where('id',$id)->first();

        return view('std.hwShow',[
            'title' => $this->hwName[$id%10],
            'backUrl' => url('homework'),
            'hw' => $hw,
        ]);
    }
	public function cmshow($id){
        $hw = DB::table('homeworks')->select('id','contect')->where('id',$id)->first();
		 $score = DB::table('scores')->where('userId',Auth::user()->uid)->select(
                    'hwId as hw',
                    'hwScore as Score'
                )->pluck('Score', 'hw');
        return view('std.cmShow',[
            'title' => $this->hwName[$id%10],
            'backUrl' => url('homework'),
            'hw' => $hw,
			'scores' => $score,
        ]);
    }
}
