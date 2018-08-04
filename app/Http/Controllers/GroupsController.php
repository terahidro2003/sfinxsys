<?php

namespace App\Http\Controllers;

use App\Groups;
use App\Dancers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $message)
    {
       
      
        $groups_data = Groups::all();
       foreach($groups_data as $data){
        //dd(Dancers::where('dance_group', $data->name)->count());
       // $groups_data->members_count = Dancers::where('dance_group', $data->name)->count();
        Groups::where('id', $data->id)->update(['members_count' => Dancers::where('dance_group', $data->name)->count()]);
       // dd(Groups::select('members_count')->get());
       }
        $groups_data = Groups::all();
     //  $groups_data->members_count = $members_count;
      
       //$dancers_data = DB::select('select * from dancers');
    /*   foreach ($groups_data as $data) {
           $groups_data->members_count= count(DB::select('select * from dancers where dance_group=?', [$data->name]));
       }*/
       
       return view('groups', ['groups_data' => $groups_data],['message' => $message]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show_store_view(){
        $message = "";
        return view('new_group', ['message' => $message]);
    }
    public function store(Request $request)
    {
        global $message;
        try{
           // $random_id = rand(1000,9999);
            $name = request()->input('name');
            $members_count = 0;
            $leader = request()->input('leader');
            $created_at = date("Y-m-d H:i:s");
            $updated_at = date("Y-m-d H:i:s");
            $updated = $created_at;
            DB::insert('insert into groups (name, members_count, updated, leader, created_at, updated_at) values (?,?,?,?,?,?)', [$name, $members_count, $updated, $leader,$created_at, $updated_at]);
            $message = 'Succsessful';
            return redirect('dancers/groups');
        }catch(\Illuminate\Database\QueryException $ex){
            $message = $ex;
            return view('new_group', ['message' => $message]);
        }

       // action('GroupsController@index', ['message' => $message]);
      
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function show($group_id)
    {
        $group_data = Groups::where('name', $group_id)->get();
        $groups_data = DB::select('select * from dancers where dance_group=?', [$group_id]);
        return view('members', ['groups_data' => $groups_data, 'group_data' => $group_data]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function edit(Groups $groups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function update($group_id, Request $request)
    {
        if ($request->isMethod('post')){
        $new_group_name = request()->input('name');
        $group_leader = request()->input('leader');
        $updated_at = date("Y-m-d H:i:s");
        $group_name = Groups::where('id', $group_id)->first()->get();
       // $old_group_name = DB::select('select name from groups')
        DB::update('update groups set name=?, leader=?, updated_at=? where id=?', [$new_group_name, $group_leader, $updated_at, $group_id]);
        DB::update('update dancers set dance_group=? where dance_group=?', [$new_group_name,$group_name]);
        $message = "Succsessful";
        return redirect()->route('groups');
        }else{
             $message;
        try{
            $group_name = Groups::where('id', $group_id)->select('name')->first();
            //dd($group_name);
            $group = DB::select('select * from groups where id=?', [$group_id]);
            $dancers = DB::select('select * from dancers where dance_group = ?', [$group_name]);
            //dd($group_name);
            $message = "";
            return view('edit_group', ['groups_data' => $group, 'dancers' => $dancers, 'message' => $message]);
        }catch(\Illuminate\Database\QueryException $ex){
            $message = "Error";
        }
        }
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groups $groups)
    {
        //
    }

    public function show4edit($group_name){
       
        
    }
}
