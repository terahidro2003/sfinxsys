<?php

namespace App\Console;
use DB;
use App\timetable;
use App\SingularTimetables;
use App\Groups;
use App\signup_requests;
use App\Dancers;
use App\Payments;
use App\statistics;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function(){
            $current_month_begin = date("Y-m-d");
            $current_month_end = date('Y-m-d', strtotime('-30 days'));
            $dancers = DB::select('select * from dancers');
            foreach ($dancers as $dancer) {
                $new_credit = ($dancer->credit) - 30;
                DB::update('update dancers set credit=? where id=?', [$new_credit, $dancer->id]);
            }
            $statistics = new statistics();
            $statistics->id = rand(10000,20000);
            $statistics->year = date("Y");
            $statistics->month = date("m");
            $statistics->deptors_count = Dancers::select('credit')->where('credit', '<=', 0)->count();
            $statistics->dancers_count = Dancers::count();
            $statistics->signup_count = signup_requests::count();
            $statistics->trainings_count = SingularTimetables::whereBetween('date', [$current_month_begin, $current_month_end])->count();
            $statistics->money_count = Payments::whereBetween('created_at', [$current_month_begin, $current_month_end])->count();
            $statistics->save();
        })->everyMinute();
        $schedule->call(function(){
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
                
                $singular_trainings->id = rand();
                $singular_trainings->group_name = $group->name;
                $singular_trainings->group_id = $group->id;
                $singular_trainings->date = $week[$x];
                $singular_trainings->week_day = $date_in_weekday;
               // $singular_trainings->time_from = timetable::where('group_id', $group->id)->where('week_day', date("l", strtotime($week[$x])))->select('time_from');
               // $singular_trainings->time_to = timetable::where('group_id', $group->id)->where('week_day', date("l", strtotime($week[$x])))->select('time_to');
                //$singular_trainings_time = DB::select('select * from timetables where group_id=? and week_day=?', [$group->id, $date_in_weekday]);
                $singular_trainings->save();
            }}}
             })->everyMinute();
           
        // $schedule->command('inspire')
        //          ->hourly();
       
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
