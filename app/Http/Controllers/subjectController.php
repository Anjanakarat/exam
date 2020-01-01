<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Faceades\Storage;
use App\subReg;
use DB;

class subjectController extends Controller
{
	public function subjectRegister(Request $request){

		$id_exists = subReg::where('subjectid',  $request->input('subjectid'))->orWhere('subjectname',  $request->input('subjectname'))->first();
	 
	        if($id_exists === null  )  {
	              $class = new subReg (); 
				  $class-> subjectid = $request->input('subjectid');
				  $class-> subjectname= $request->input('subjectname');
				  $class->save();

		         if($class -> id > 0){
		          	$response = [
		          		"status" => 1,
		          		"msg" => "new subject created"
		          	];
		          	 return response()->json($response);
		          } 
	        
	             else {
		          	$response = [
		          		"status" => 0,
		          		"msg" => "failed to create new subject"
		          	];
		          	  return response()->json($response);
		          }
            }
	        else{
		       	$response = [
		       		"status" => 0,
		       		"msg" => "Already Registered"
		       	];
		       	return response()->json($response);
	       } 
    
	}
     
}
