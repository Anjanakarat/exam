<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Faceades\Storage;
use App\questionmcq;
use App\classReg;
use App\subReg;
use DB;

class mcqController extends Controller
{
    public function classEntry(){

		    return response()->json(classReg::get());
  
      	   }

	public function subjectEntry(){
        
         return response()->json(subReg::get());
	     
	     } 

	public function questionEntry(Request $request){
		

	        $question = new questionmcq();

			$question-> fk_class_id = $request->input('fk_class_id');
			$question-> fk_subject_id = $request->input('fk_subject_id');
			$question-> question = $request->input('question');
			$question-> optionA = $request->input('optionA');
    	    $question-> optionB = $request->input('optionB');
    	    $question-> optionC = $request->input('optionC');
    	    $question-> optionD = $request->input('optionD');
			$question-> correctanswer = $request->input('correctanswer');

			$question->save();
			    if($question -> id > 0){
		          	$response = [
		          		"status" => 1,
		          		"msg" => "question added"
		          	];
		          	 return response()->json($response);
		          } else {
		          	$response = [
		          		"status" => 0,
		          		"msg" => "failed"
		          	];
		          	  return response()->json($response);
		          }
       
      
      
 
   }	       
}           

