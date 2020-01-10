<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\classReg;

class classController extends Controller
{
	public function fn_create_class(Request $request)
	{
		$id_exists = classReg::where('classid', $request->input('classid'))->orWhere('classname', $request->input('classname'))->first();
		if ($id_exists === null) {
			$class = new classReg();
			$class->classid = $request->input('classid');
			$class->classname = $request->input('classname');
			$class->save();
			if ($class->id > 0) {
				$response = [
					"status" => 1,
					"msg" => "new class created"
				];
				return response()->json($response);
			} else {
				$response = [
					"status" => 0,
					"msg" => "failed to create new class"
				];
				return response()->json($response);
			}
		} else {
			$response = [
				"status" => 0,
				"msg" => "Class already exits"
			];
			return response()->json($response);
		}
	}

	public function fn_get_all_class()
	{
		$class_obj = classReg::all();
		return response($class_obj);
	}

}
