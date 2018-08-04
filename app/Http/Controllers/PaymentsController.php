<?php

namespace App\Http\Controllers;

use App\Payments;
use App\Dancers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($dancer_id)
    {
        $dancer_data = DB::select('select * from dancers where id=?', [$dancer_id]);
        return view('make_payment', ['dancer_data' => $dancer_data]);
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
    public function store($dancer_id)
    {
       // $random_id = rand(1000,9999);
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        //$fail = DB::select('select * from dancers where last_name=?', ['Pagojutė']);
        $old_crediarray = Dancers::where('id', $dancer_id)->get();
        $old_credit;
        $discount;
        foreach ($old_crediarray as $credit_foreach) {
            $old_credit = $credit_foreach->credit;
            $discount = $credit_foreach->discount;
        }
        $money = 30 - $discount;
        $new_credit = $old_credit + $money;
        DB::insert('update dancers set credit=? where id=?', [$new_credit, $dancer_id]);
        DB::insert('insert into payments (dancer_id, money, created_at, updated_at) values (?,?,?,?)', [$dancer_id, $money, $created_at, $updated_at]);
        $message_data = DB::select('select * from alerts where category=?', ['PaymentSuccessful']);
        return redirect()->back()->withErrors(['success']);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function show(Payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function edit(Payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payments $payments)
    {
        //
    }
}
