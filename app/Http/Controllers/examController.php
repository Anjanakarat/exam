<?php

namespace App\Http\Controllers;

use App\Exam;
use App\ExamQuestions;
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


   public function fn_create_exam(Request $request)
   {  
      $auth = UserLogin::where(['id' => $request->input('userId'), 'role' => 'admin'])->first();
      if (is_null($auth)) {
            $response = [
               'status' => 0,
               'msg' => 'permission denied'
            ];
            return response($response);
      } else {
         $exam = new Exam();
         $exam->fk_class_id = $request->input('class_id');
         $exam->fk_subject_id = $request->input('subject_id');
         $exam->exam_title = $request->input('exam_title');
         $exam->total_marks = $request->input('total_marks');
         $exam->save();
         $exam_questions_id = $request->input('questions');
         foreach ($exam_questions_id as $exam_question_id) {
            $exam_question_obj = new ExamQuestions();
            $exam_question_obj->fk_question_id = $exam_question_id;
            $exam_question_obj->fk_exam_id = $exam->id;
            $exam_question_obj->save();
         }
         return response(['status' => 1, 'msg' => 'new exam created']);
      }  
   }

   public function fn_get_exam(Request $req)
   {
      $query = [
         'fk_class_id' => $req->input('class_id'),
         'fk_subject_id' => $req->input('subject_id')
      ];
      $exams = Exam::where($query)->get(['id', 'total_marks', 'exam_title']);
      foreach ($exams as $exam) {
         $exam->questions = $exam->questions;
      }
      return response($exams);
   }

}
