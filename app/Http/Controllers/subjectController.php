<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subReg;


class subjectController extends Controller
{
	public function fn_create_subject(Request $request)
	{
		$id_exists = subReg::where('subjectid', $request->input('subjectid'))->orWhere('subjectname', $request->input('subjectname'))->first();
		if ($id_exists === null) {
			$class = new subReg();
			$class->subjectid = $request->input('subjectid');
			$class->subjectname = $request->input('subjectname');
			$class->save();

			if ($class->id > 0) {
				$response = [
					"status" => 1,
					"msg" => "new subject created"
				];
				return response()->json($response);
			} else {
				$response = [
					"status" => 0,
					"msg" => "failed to create new subject"
				];
				return response()->json($response);
			}
		} else {
			$response = [
				"status" => 0,
				"msg" => "Subject already exists"
			];
			return response()->json($response);
		}
	}


	public function fn_get_all_subjects()
	{
		$subjects = subReg::all();
		return response($subjects);
	}
}
