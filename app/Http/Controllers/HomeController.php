<?php

namespace App\Http\Controllers;
use App\Dancers;
use App\SingularTimetables;
use App\signup_requests;
use App\statistics;
use App\Payments;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_month_end = date('Y-m-d', strtotime('+1 day'));

        $current_month_begin = date('Y-m-d', strtotime('-1 month'));
        //show data between before three months and the current date
        $current_month = date("m");
        $current_year = date("Y");
        //countable variables
        $mc = 0;
        $money =  Dancers::get();

        foreach ($money as $m) {
           $mc = $mc + $m->credit;
        }
        //dd($mc);
        $trainings_count = SingularTimetables::count();
        $dancers_count = Dancers::count();
        $signup_count = signup_requests::count();
        $deptors_count = Dancers::where('credit', '<=', 0)->count();
        //array variables
        $deptors_array = Dancers::where('credit', '<=', 0)->get();
        $current_end_date = date('Y-m-d', strtotime('+1 day'));
      //  dd($current_end_date);
        $mon_cur = Payments::whereBetween('created_at', [$current_month_begin, $current_end_date])->get();
        $money_current = 0;
        foreach ($mon_cur as $mm) {
           $money_current += $mm->money;
        }

        return view('home', ['money' => $mc, 'trainings_count' => $trainings_count, 'dancers_count' => $dancers_count, 'signup_count' => $signup_count, 'deptors_count' => $deptors_count, 'deptors' => $deptors_array, 'start' => $current_month_begin, 'end' => $current_month_end, 'money_current' => $money_current]);
       // return view('home');
    }
}
