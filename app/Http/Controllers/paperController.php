<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Faceades\Storage;
use App\questionPaper;
use DB;


class paperController extends Controller
{
    public function paperEntry(Request $request){
    	 $questionp = new questionPaper();

			$questionp-> fk_classid = $request->input('fk_classid');
			$questionp-> fk_subjectid = $request->input('fk_subjectid');
			$questionp-> year = $request->input('year');
			if($request->hasFile('questionpaper')){
	              $file = $request->file('questionpaper');
	              $extension =time().'.'.$file->getClientOriginalExtension();
	              $destinationPath = public_path('/question');
	              $file->move($destinationPath,$extension);
	              $questionp-> questionpaper = $extension;

                 // echo $questionp-> questionpaper = $extension;
             }
		    else{
		    $questionp-> questionpaper ='';
		    }
			$questionp->save();
			    if($questionp -> id > 0){
		          	$response = [
		          		"status" => 1,
		          		"msg" => "file uploaded"
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
