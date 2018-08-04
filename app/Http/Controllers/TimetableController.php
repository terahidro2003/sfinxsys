<?php

namespace App\Http\Controllers;

use App\timetable;
use App\SingularTimetables;
use App\Groups;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Console\Scheduling\Schedule;

class TimetableController extends Controller
{
    public function show_group_timetable($group_id){
        $group_timetable = timetable::where('group_id', $group_id)->get();
        $group_name = Groups::where('id', $group_id)->get();
        return view('group_timetable', ['timetable_data' => $group_timetable, 'group_name' => $group_name]);
    }

    public function singular_trainings(){
        //week days date algorithm
        $date = date('Y-m-d');
        $ts = strtotime($date);
        // calculate the number of days since Monday
        $dow = date('w', $ts);
        $offset = $dow - 1;
        if ($offset < 0) {
            $offset = 6;
        }
        // calculate timestamp for the Monday
        $ts = $ts - $offset*86400;
        // loop from Monday till Sunday 
        for ($i = 0; $i < 7; $i++, $ts += 86400){
            $week[$i] = date("Y-m-d", $ts);

            // print date("m/d/Y l", $ts) . "\n";
        }

        
        $groups = Groups::all();
        //start a loop with count of all groups
        foreach ($groups as $group) { 
            //echo $group->name;
            for ($x = 0;$x < 7;$x++){ //starts a loop with ount of week days (7)
                //dd($x);
                //echo $x;
                $singular_trainings = new SingularTimetables;
                $date_in_weekday = date('l', strtotime($week[$x]));
                $singular_trainings_time = timetable::where('group_id', $group->id)->where('week_day', $date_in_weekday)->get();
                $current_week_day_selected = timetable::where('week_day', $date_in_weekday)->where('group_id', $group->id)->get();
                
                foreach ($singular_trainings_time as $timet) {
                   $singular_trainings->time_from = $timet->time_from;
                }
                foreach ($singular_trainings_time as $tomet) {
                   $singular_trainings->time_to = $tomet->time_to;
                }
                $checkIfSingularTrainingsIsEmpty = SingularTimetables::where('week_day', $date_in_weekday)->where('group_id', $group->id)->where('time_from', $singular_trainings->time_from)->where('time_to', $singular_trainings->time_to)->get();
                //dd($current_week_day_selected);
                if ($current_week_day_selected->isNotEmpty() && $checkIfSingularTrainingsIsEmpty->isEmpty()){
                //dd($current_week_day_selected);
                
                //$singular_trainings->id = rand();
                $singular_trainings->group_name = Groups::where('id', $group->id)->first();
                $singular_trainings->group_id = $group->id;
                $singular_trainings->date = $week[$x];
                $singular_trainings->week_day = $date_in_weekday;
               // $singular_trainings->time_from = timetable::where('group_id', $group->id)->where('week_day', date("l", strtotime($week[$x])))->select('time_from');
               // $singular_trainings->time_to = timetable::where('group_id', $group->id)->where('week_day', date("l", strtotime($week[$x])))->select('time_to');
                //$singular_trainings_time = DB::select('select * from timetables where group_id=? and week_day=?', [$group->id, $date_in_weekday]);
                $singular_trainings->save();
                }else{

                } 
               // dd($singular_trainings->time_from);
               // $time_from = json_decode(implode("",$singular_trainings_time_to)); 
               // dd($time_from);
            //  DB::insert('insert into singular_timetables (id, group_id, date, week_day, time_from, time_to) values (?,?,?,?,?,?)', [$singular_trainings->id, $singular_trainings->group_id, $singular_trainings->date,$singular_trainings->week_day,$singular_trainings->time_from,$singular_trainings->time_to]);
           }
        }
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $group_data = Groups::all();
        $current_timetable = SingularTimetables::orderBy('date')->get();
        foreach ($current_timetable as $timetable) {
            switch ($timetable->week_day) {
                case 'Monday':
                    $current_timetable->week_day = 'Pirmadienis';
                    break;
                 case 'Tuesday':
                    $current_timetable->week_day = 'Antradienis';
                 break;
                 case 'Wednesday':
                    $current_timetable->week_day = 'Trečiadienis';
                break;
                case 'Thursday':
                    $current_timetable->week_day = 'Ketvirtadienis';
                break;
                case 'Friday':
                    $current_timetable->week_day = 'Penktadienis';
                break;
                case 'Saturday':
                    $current_timetable->week_day = 'Šeštadienis';
                break;
                case 'Sunday':
                    $current_timetable->week_day = 'Sekmadienis';
                break;
                default:
                    $current_timetable->week_day = null;
                break;
            }
        }
        return view('timetables', ['current_timetable' => $current_timetable, 'group_data' => $group_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($group_id, Request $request)
    {
        if ($request->isMethod('post')){
            try{
            $week_day = request()->input('week_day');
            switch ($week_day) {
                case 'Pirmadienis':
                    $timetable_week_day = 'Monday';
                    break;
                 case 'Antradienis':
                    $timetable_week_day = 'Tuesday';
                 break;
                 case 'Trečiadienis':
                    $timetable_week_day = 'Wednesday';
                break;
                case 'Ketvirtadienis':
                    $timetable_week_day = 'Thursday';
                break;
                case 'Penktadienis':
                    $timetable_week_day = 'Friday';
                break;
                case 'Šeštadienis':
                    $timetable_week_day = 'Saturday';
                break;
                case 'Sekmadienis':
                    $timetable_week_day = 'Sunday';
                break;
                default:
                    $timetable_week_day = null;
                break;
            }
            $n = new timetable();
            //$n->id = rand(100,999);
            $temp_groups =  Groups::where('id', $group_id)->get();
            foreach ($temp_groups as $group) {
                $n->group_id = $group->id;
                $n->group_name = $group->name;
            }
            $n->week_day = $timetable_week_day;
            $n->time_from = request()->input('time_from');
            $n->time_to = request()->input('time_to');
            $n->created_at = date("Y-m-d H:i:s");
            $n->updated_at = date("Y-m-d H:i:s");
          //  dd($n);
            $n->save();
            $message = 'Successful';
            $timetable = DB::select('select * from timetables where id=?', [$n->id]);
            //return redirect('timetable');
             $group = Groups::where('id', $group_id)->get();
            return view('create_timetable', ['message' => $message, 'group' => $group]);
            }catch(\Illuminate\Database\QueryException $ex){
                $message = $ex;
                 $timetable = DB::select('select * from timetables where id=?', [$n->id]);
                 $group = Groups::where('id', $group_id)->get();
                    return view('create_timetable', ['message' => $message, 'group' => $group]);
            }
            
        }else{
            $message = "";
            $group = Groups::where('id', $group_id)->get();
            $timetable = DB::select('select * from timetables where group_id=?', [$group_id]);
            //dd($timetable);
            return view('create_timetable', ['message' => $message, 'group' => $group]);

        //
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $date = request()->input('date');
        $week_day = request()->input('week_day');
        $timetable_info = SingularTimetables::where('date', $date)->orderBy('time_from')->get();
        $groups = Groups::all();
        //$groups->group_name = Groups::where('id', $data->id);
        return view('view_timetable', ['timetable_info' => $timetable_info, 'week_day' => $week_day, 'date' => $date, 'groups' => $groups]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function edit(timetable $timetable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        if ($request->isMethod('post')){
            try{
            $week_day = request()->input('week_day');
            switch ($week_day) {
                case 'Pirmadienis':
                    $timetable_week_day = 'Monday';
                    break;
                 case 'Antradienis':
                    $timetable_week_day = 'Tuesday';
                 break;
                 case 'Trečiadienis':
                    $timetable_week_day = 'Wednesday';
                break;
                case 'Ketvirtadienis':
                    $timetable_week_day = 'Thursday';
                break;
                case 'Penktadienis':
                    $timetable_week_day = 'Friday';
                break;
                case 'Šeštadienis':
                    $timetable_week_day = 'Saturday';
                break;
                case 'Sekmadienis':
                    $timetable_week_day = 'Sunday';
                break;
                default:
                    $timetable_week_day = null;
                break;
            }
            $timetable_time_from = request()->input('time_from');
            $timetable_time_to = request()->input('time_to');
            DB::insert('update timetables set week_day=?, time_from=?, time_to=? where id=?', [$timetable_week_day, $timetable_time_from, $timetable_time_to, $id]);
            $message = 'Successful';
            $timetable = DB::select('select * from timetables where id=?', [$id]);
            //return redirect('timetable');
            return view('timetable_edit', ['message' => $message, 'timetable' => $timetable]);
            }catch(\Illuminate\Database\QueryException $ex){
                $message = $ex;
                return view('timetable_edit', ['message' => $message, 'timetable' => $timetable]);
            }
            
        }else{
            $message = "";
            $timetable = DB::select('select * from timetables where id=?', [$id]);
            //dd($timetable);
            return view('timetable_edit', ['message' => $message, 'timetable' => $timetable]);
        }
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function destroy(timetable $timetable)
    {
        //
    }
}
