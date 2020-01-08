<?php

namespace App\Http\Controllers;

use App\UserDetails;
use Illuminate\Http\Request;
use App\UserLogin;


class examController extends Controller
{
   public function create_user(Request $request)
   {
      $user_exists = UserLogin::where('email', $request->input('email'))->first();
      if ($user_exists === null) {

         $user = new UserLogin();
         if ($request->input('role') == 'admin') {
            $auth = UserLogin::find($request->input('userId'));
            if (!is_null($auth)) {
               $response = [
                  'status' => 0,
                  'msg' => 'permission denied'
               ];
               if ($auth->role == 'admin') {
                  $user->role = 'admin';
               } else {
                  return response($response);
               }
            } else {
               return response($response);
            }
         } else {
            $user->role = 'user';
         }
         $user->email = $request->input('email');
         $user->password = $request->input('password');
         $user->save();

         if ($user->id > 0) {
            if ($user->role == 'user') {
               $user_detail_obj = new UserDetails();
               $user_detail_obj->firstname = $request->input('firstname');
               $user_detail_obj->lastname = $request->input('lastname');
               $user_detail_obj->phone = $request->input('phone');
               $user_detail_obj->user_login_id = $user->id;
               $user_detail_obj->save();
               if ($user_detail_obj->id > 0) {
                  $response = [
                     "status" => 1,
                     "msg" => "new user created"
                  ];
                  return response($response);
               }
            } else {
               $response = [
                  "status" => 1,
                  "msg" => "new admin created"
               ];
               return response($response);
            }
         }
      } else {
         $response = [
            "status" => 0,
            "msg" => "This Account already exist"
         ];
         return response($response);
      }
   }


   public function user_login(Request $request)
   {
      $user = UserLogin::where('email', $request->input('email'))->first();
      if ($user === null) {
         $response = [
            "status" => 0,
            "msg" => "no user exists"
         ];
         return response($response);
      } else {
         if ($user->password == $request->input('password')) {
            $response = [
               "status" => 1,
               "userID" => $user->id,
               "role" => $user->role
            ];
            return response($response);
         } else {
            $response = [
               "status" => 0,
               "msg" => "incorrect password"
            ];
            return response($response);
         }
      }
   }

}
