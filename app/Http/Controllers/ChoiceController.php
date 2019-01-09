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
    public $chName = ["無","一","二","三","四","五","六","七"];
	public $hwName=["請選擇...","作業一","作業二","作業三","作業四","作業五","作業六","期末作業"];
    public $chAns = ["X","A","B","C","D"];

    public function index(){

    	if(Auth::user()->type == "正式生"){
    		return url('/home');
    	}else{
    		$choices = DB::table('choices')->select(
    			'id',
                'chapter', 
    			'topic',
    			'ans',
    			'question'
    		)->get();

    		return view('ta.choice',[
                'choices' => $choices,
                'chName' => $this->chName,
                'chAns' => $this->chAns,
            ]);
    	}
    }

    public function create(){

        return view('ta.choiceForm',[
            'title' => '建立選擇題',
            'FormType' => 'Create',
            'action' => route('choice.create'),
            'chName' => $this->chName,
            'chAns' => $this->chAns,
        ]);
    }

    public function store(Request $request){

        DB::table('choices')->insert([
            'chapter' => $request->chap, 
            'topic' => $request->grop,
            'question' => $request->question,
            'option1' => $request->optionA,'option2' => $request->optionB,
            'option3' => $request->optionC,'option4' => $request->optionD,
            'ans' => $request->ans,
        ]);

        return redirect('/choice');
    }

    public function edit($id){

        $choices = DB::table('choices')->select(
            'chapter as chap', 'topic as grop','ans','question',
            'option1','option2','option3','option4'
        )->where('id',$id)->first();

        return view('ta.choiceForm',[
            'title' => '修改選擇題',
            'FormType' => 'Edit',
            'action' => $id,
            'chName' => $this->chName,
            'chAns' => $this->chAns,
            'choices' => $choices,
        ]);
    }

    public function update(Request $request, $id){

        DB::table('choices')->where('id', $id)->update([
            'chapter' => $request->chap, 
            'topic' => $request->grop,
            'question' => $request->question,
            'option1' => $request->optionA,'option2' => $request->optionB,
            'option3' => $request->optionC,'option4' => $request->optionD,
            'ans' => $request->ans,
        ]);

        return redirect('/choice');
    }

    public function destroy(Request $request, $id){
        DB::table('choices')->where('id', $id)->delete();

        return redirect('/choice');
    }
	
	public function answer($id){
         $hw = DB::table('homeworks')->select('id','contect')->where('id',$id)->first();
		 $choices = DB::table('choices')->select(
            'id', 'topic','ans','question',
            'option1','option2','option3','option4'
        )->where('chapter',$id)->get();
        

        return view('std.hwAns',[
         'title' => $this->hwName[$id%10],
         'hw' => $hw,  
         'choices' => $choices,
         'count' => 0,
        ]);
    }
	public function submit(Request $request, $id){
		$submits = DB::table('submits')->select('id')->where('userId',Auth::user()->uid)->where('hwId',$id)->first();
		
		$point =0;
		
		for($i=0;$i<count($request->QA[$i]);$i++){
        $studentAns = $request->ans[$i];
		$questionAns = $request->QA[$i];
		
		if($studentAns == $questionAns){
			$point++;
		 }
		}
		
		date_default_timezone_set("Asia/Shanghai");
		$date = date("Y-m-d h:i:s");
		
		if($submits){
        DB::table('submits')->where('userId',Auth::user()->uid)->where('hwId',$id)->update([
            'updated_at' => $date,
            'choice' => $point, 
        ]);
		}else{
		DB::table('submits')->where('userId',Auth::user()->uid)->where('hwId',$id)->insert([
		    'userId' => Auth::user()->uid,
			'hwId' =>$id,
			'created_at' => $date,
			'updated_at' => $date,
            'choice' => $point, 
        ]);	
		}

		$request->session()->flash(
            'status', 
            "選擇題的得分為{$point}分!!"
        );
		/*
        return view('std.hwAnsform',[
		'score' => $point,
		'submits' => $submits,
		]);
		*/
		
		return redirect('/home');
		
    }
}
