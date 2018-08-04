<?php

namespace App\Http\Controllers;

use App\dancers;
use App\groups;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DancersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth')->except(['new_rfid']);
    }
    public function index(Request $request)
    {
       $signup_request_data = DB::select('select * from signup_requests where id=?', [request()->input('id')]);
       $groups = DB::select('select name from groups');
       return view('add_dancer', ['signup_request_data' => $signup_request_data, 'groups' => $groups]);
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
     * Transfers and adds confirmed dancers data into 'dancers' table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$random_id = rand(1000,9999);
        $first_name = request()->input('first_name');
        $last_name = request()->input('last_name');
        $birth_date = request()->input('birth_date');
        $phone_number = request()->input('phone');
        $parents_phone_number = request()->input('parents_phone');
        $facebook = request()->input('facebook');
        $group = request()->input('group_select');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        $discount = request()->input('discount');
        
        DB::insert('insert into dancers (first_name, last_name, birth_date, phone_number, parents_phone_number, facebook, dance_group, discount, credit, created_at, updated_at) values (?,?,?,?,?,?,?,?,?,?,?)', [$first_name, $last_name, $birth_date, $phone_number, $parents_phone_number, $facebook, $group, $discount, 0, $created_at, $updated_at]);

        //$dancer = dancers::where('id', $random_id)->get();
        DB::delete('delete from signup_requests where first_name=? and last_name=?', [$first_name, $last_name]);
        //DB::insert('insert into temporary_r_f_i_d_keys (id, first_name, last_name, created_at, updated_at) values (?,?,?,?,?)', [$random_id, $first_name, $last_name,$created_at, $updated_at]);

       // dd($dancer);
        return redirect()->route('signup_requests');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dancers  $dancers
     * @return \Illuminate\Http\Response
     */
    public function show(dancers $dancers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dancers  $dancers
     * @return \Illuminate\Http\Response
     */
    public function edit(dancers $dancers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dancers  $dancers
     * @return \Illuminate\Http\Response
     */
    public function update($dancer_id, Request $request)
    {
        if ($request->isMethod('post')){
            $first_name = request()->input('first_name');
            $last_name = request()->input('last_name');
            $birth_date = request()->input('birth_date');
            $phone_number = request()->input('phone');
            $parents_phone_number = request()->input('parents_phone');
            $facebook = request()->input('facebook');
            $group = request()->input('group_select');
            $updated_at = date("Y-m-d H:i:s");
            $discount = request()->input('discount');
            DB::update('update dancers set first_name=?, last_name=?, birth_date=?, phone_number=?, parents_phone_number=?, facebook=?, dance_group=?, discount=?, updated_at=? where id=?', [$first_name, $last_name, $birth_date, $phone_number, $parents_phone_number, $facebook, $group, $discount, $updated_at, $dancer_id]);
            $dancer = Dancers::where('id', $dancer_id)->get();
            $groups = groups::all();

            return view('member_edit', ['request_data' => $dancer, 'groups' => $groups]);
        }else{
            $groups = groups::all();
            $dancer = Dancers::where('id', $dancer_id)->get();
           // 
            return view('member_edit', ['request_data' => $dancer, 'groups' => $groups]);
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dancers  $dancers
     * @return \Illuminate\Http\Response
     */
    public function destroy(dancers $dancers)
    {
        //
    }
}
