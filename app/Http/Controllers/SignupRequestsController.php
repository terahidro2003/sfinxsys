<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\signup_requests;

class SignupRequestsController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signup_requests = signup_requests::latest()->get();
        return view('show_requests', ['signup_requests' => $signup_requests]);
        //
    }
    public function search(Request $search_request){
        $error = ['error' => 'No results'];

        if ($search_request->has('q')){
            $dancers_requests = signup_requests::search($search_request->get('q'))->get();
           // return $dancers_requests->count() ? $dancers_requests:$error;
            
        return view('show_requests', ['signup_requests' => $dancers_requests->count() ? $dancers_requests:$error]);
        }
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
    public function store(Request $request)
    {
        $birth_date= request()->input('birth_date');
        $current_date = date("Y");
        $years_old = date("Y", strtotime($current_date)) - date("Y", strtotime($birth_date));
        $validator = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'facebook' => 'required',
            'birth_date' => 'required|date',
            'phone' => 'required',
            'parents_phone' => 'required_if:birth_date,=>,2000/01/01',
        ]);
        //return redirect()->route('signup')->withInput();
            //   dd(request()->all());
        //$random_id = rand(1000,9999);
        $first_name = request()->input('first_name');
        $last_name = request()->input('last_name');
        $birth_date = request()->input('birth_date');
        $phone_number = request()->input('phone');
        $parents_phone_number = request()->input('parents_phone');
        $facebook = request()->input('facebook');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        DB::insert('insert into signup_requests (first_name, last_name, birth_date, phone_number, parents_phone_number, facebook, created_at, updated_at) values (?,?,?,?,?,?,?,?)', [$first_name, $last_name, $birth_date, $phone_number, $parents_phone_number, $facebook, $created_at, $updated_at]);
        return view('dancers_requests_created');
        
     
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
