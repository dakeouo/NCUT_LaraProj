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
            //'action' => '/home',
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
}
