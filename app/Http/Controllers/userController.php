<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Faceades\Storage;
use App\answerTable;
use App\examTable;
use App\classReg;
use App\subReg;
use App\questionmcq;
use App\userLogin;

use DB;

class userController extends Controller
{
     public function classEntry(){

		    return response()->json(classReg::get('classname'));
  
      	   }
    
	public function subjectEntry(){
        
         return response()->json(subReg::get('subjectname'));
	     
	     } 
	public function questionView(){
   	    //session start
   	     // session store - class-id,class,subid,sub 
   	     return response()->json(questionmcq::get(['question','optionA','optionB','optionC','optionD'] ));
               
   }

   public function onlinexam(){
   	
   	       $exam = new examTable();
   	     	$exam-> fk_nameid = $request->input('fk_nameid');
			$exam-> fk_classid = $request->input('fk_classid');
			$exam-> fk_subjectid = $request->input('fk_subjectid');
	 
   

}
