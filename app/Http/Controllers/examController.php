<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Faceades\Storage;
use App\userLogin;
use App\adminLogin;
use DB;


class examController extends Controller
{
    public function create_user(Request $request){
       $user_exists = userLogin::where('email', '=', $request->input('email'))->first();
       if($user_exists === null){
       	   $user = new userLogin();
	        $user-> firstname = $request->input('firstname');
	        $user-> lastname= $request->input('lastname');
	        $user-> phone = $request->input('phone');
	        $user-> email = $request->input('email');
	        $user-> password = $request->input('password');
	        $user->save(); 

	         if($user -> id > 0){
	          	$response = [
	          		"status" => 1,
	          		"msg" => "new user created"
	          	];
	          	 return response()->json($response);
	          } else {
	          	$response = [
	          		"status" => 0,
	          		"msg" => "failed to create new user"
	          	];
	          	  return response()->json($response);
	          }
       }
       else{
       	$response = [
       		"status" => 0,
       		"msg" => "This Account already exist"
       	];
       	return response()->json($response);
       } 
    
    }

    public function user_login( Request $request){
    	$user = userLogin::where('email', '=', $request->input('email'))->first();
    
         if($user === null) {
               $response = [
       		       "status" => 0,
       		       "msg" => "no user exists"
       	        ];
       	        return response($response);
          } 
         
         else {

              if($user -> password == $request->input('password')){
                   $response = [
                    "status" => 1,
                    "userID" => $user-> id

                 ];

                   // create session for storing username  and second name
                   

                   return response($response);  
                }else{
                   $response = [
                     "status" => 0,
                     "msg" => "incorrect password"
                ];
                   return response($response);
                }  	  
           }

      }

      public function create_admin(Request $request){
         $admin_exists = adminLogin::where('username', $request->input('username'))->first();
         
         if($admin_exists === null ){
          $admin = new adminLogin();
          $admin-> username = $request->input('username');
          $admin-> password = $request->input('password');
          $admin->save(); 

           if($admin -> id > 0){
              $response = [
                "status" => 1,
                "msg" => "admin created"
              ];
               return response()->json($response);
            }else {
              $response = [
                "status" => 0,
                "msg" => "failed to create new admin"
              ];
                return response()->json($response);
            }
        }    
        else{
            $response = [
              "status" => 0,
              "msg" => "This Account already exist"
            ];
          return response()->json($response);
       } 
      
    }

    public function admin_login(Request $request){
       $admin = adminLogin::where('username',  $request->input('username'))->first();
    
         if($admin === null) {
               $response = [
                 "status" => 0,
                 "msg" => "no admin exists"
                ];
                return response($response);
          } 
         
         else {

                if($admin -> password == $request->input('password')){
                     $response = [
                      "status" => 1,
                      "adminID" => $admin-> id
                   ];
                     return response($response);  
                  }else{
                     $response = [
                       "status" => 0,
                       "msg" => "incorrect password"
                  ];
                     return response($response);
                  }        
          }
    }
}
