<?php

namespace App\Http\Controllers;

use App\RFID;
use App\SingularTimetables;
use App\Dancers;
use App\EntryLog;
use App\WaitRFIDSignup;
use Illuminate\Http\Request;

class RFIDController extends Controller
{
    public function rfid_check(Request $request){
        $rfid_key = request()->input('rfid_key');
        $current_training_id;
        $current_dancer = Dancers::where('rfid_id', $rfid_key)->get();
        $current_dancer_group = Dancers::where('rfid_id', $rfid_key)->select('dance_group')->get();
        foreach ($current_dancer_group as $group) {
            $current_training_id = SingularTimetables::where('group_id', $group->id)->where('CurrentlyActive', true)->select('id')->first();
        //dd($current_training_id);
        if ($current_training_id->isNotEmpty()){
            $entry_log = new EntryLog;
            //$entry_log->id = rand(1000,9999);
            $entry_log->dancer_id = Dancers::where('rfid_id', $rfid_key)->select('id')->get();
            $entry_log->group_id = $group_id;
            $entry_log->time = date("H:i:m");
            $entry_log->training_id = $current_training_id;
            $entry_log->save();
           // echo "written";
        }else{
            echo "Ne tavo trenke";
        }
         //   $group_id = $group->id;
        }

        
        //check wich training is at the current time
      //  $current_time = date("H:i:s");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
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

    public function get_last_rfid(){
        $rfid_key = WaitRFIDSignup::select('rfid_key')->get()->first;
        echo $rfid_key->rfid_key;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hello = "11 22 33 44";
        return $hello;
        //$dancer_id = request()->name('dancer_id');

        
        //echo "Hello";
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RFID  $rFID
     * @return \Illuminate\Http\Response
     */
    public function show(RFID $rFID)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RFID  $rFID
     * @return \Illuminate\Http\Response
     */
    public function edit(RFID $rFID)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RFID  $rFID
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RFID $rFID)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RFID  $rFID
     * @return \Illuminate\Http\Response
     */
    public function destroy(RFID $rFID)
    {
        //
    }
}
