<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Faceades\Storage;
use App\classReg;
use DB;

class classController extends Controller
{
  public function classRegister(Request $request){
	  
	     $id_exists = classReg::where('classid',  $request->input('classid'))->orWhere('classname',  $request->input('classname'))->first();
	 
	     // $class_exists = classReg::where('class_name',  $request->input('class_name'))->first();
           if($id_exists === null  )  {
	              $class = new classReg (); 
				  $class-> classid = $request->input('classid');
				  $class-> classname= $request->input('classname');
				  $class->save();

		         if($class -> id > 0){
		          	$response = [
		          		"status" => 1,
		          		"msg" => "new class created"
		          	];
		          	 return response()->json($response);
		          } 
	        
	             else {
		          	$response = [
		          		"status" => 0,
		          		"msg" => "failed to create new class"
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
