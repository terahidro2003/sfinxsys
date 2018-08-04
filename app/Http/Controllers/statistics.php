<?php

namespace App\Http\Controllers;

use App\Dancers;
use App\SingularTimetables;
use App\signup_requests;
use App\statistics;
use Illuminate\Http\Request;

class statistics extends Controller
{
	//gets a list of deptors of all studio
	public function index(){
		//show data between before three months and the current date
		$current_month = date("m");
		$current_year = date("Y");
		//countable variables
		$money =  statistics::select('money')->where('month', $current_month)->where('year', $current_year);
		$trainings_count = SingularTimetables::count();
		$dancers_count = Dancers::count();
		$signup_count = signup_requests::count();
		//array variables
		$deptors_array = Dancers::where('credit', '<=', 0)->get();
		return view('statistics', ['money' => $money, 'trainings_count' => $trainings_count, 'dancers_count' => $dancers_count, 'signup_count' => $signup_count, 'deptors_count' => $deptors_count]);

	}
	public function show(Request $request){
		//show statistics for custom date range
	}
    //
}
