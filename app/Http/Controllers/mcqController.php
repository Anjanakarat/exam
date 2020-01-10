<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questionmcq;
use App\QuestionOptions;

class mcqController extends Controller
{
	public function fn_create_question(Request $request)
	{
		$question_obj = new questionmcq();
		$question_obj->fk_class_id = $request->input('class_id');
		$question_obj->fk_subject_id = $request->input('subject_id');
		$question_obj->question = $request->input('question');
		$question_obj->title = $request->input('title');
		$question_obj->correct_option = $request->input('correctOption');
		$question_obj->save();

		$options = $request->input('options');
		foreach ($options as $option) {
			$option_obj = new QuestionOptions();
			$option_obj->option = $option;
			$option_obj->fk_question_id = $question_obj->id;
			$option_obj->save();
		}

		if ($question_obj->id > 0) {
			$response = [
				"status" => 1,
				"msg" => "question added"
			];
			return response($response);
		} else {
			$response = [
				"status" => 0,
				"msg" => "failed"
			];
			return response($response);
		}
	}

	public function fn_get_question(Request $req)
	{
		$query = [
			'fk_class_id' => $req->input('class_id'),
			'fk_subject_id' => $req->input('subject_id')
		];
		$questions = questionmcq::where($query)->get(['id', 'question', 'title']);
		foreach ($questions as $question) {
			$question->options = $question->options; 
		}
		return response($questions);
	}

}
