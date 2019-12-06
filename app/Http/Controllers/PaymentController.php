<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Loan;
use App\Models\Payment;
use DB;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
         $loans = Loan::orderby('customer_id', 'asc')->paginate(10);
         
         $cu = DB::table('customers as c')
         ->join('loans as l', 'l.customer_id', 'c.id')
         ->join('credits as cr', 'cr.id', 'l.credit_id')
         ->join('places as p', 'p.id', 'cr.place_id')
         ->select(DB::raw('CONCAT(c.name," " , c.first_last_name," " , c.second_last_name) as customer'), 'l.loan_amount', 'l.id as loan_id', 'l.total_amount_to_pay', 'l.loan_date', 'p.name as place_name')
         ->paginate(10);
        //$loans = DB::select('SELECT * FROM loans');
        return view('payments.index')->with('cu',$cu); 
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($loan_id)
    {
        $Payment = Payment::where('loan_id', $loan_id)->get();
        return view ('payments.detail')->with('Payment',$Payment);
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

    public function pay($id,$loan_id)
    {   
        $p = Payment::find($id);
        $p->status=1;
        $p->save();
        $Payment = Payment::where('loan_id', $loan_id)->get();
        return view ('payments.detail')->with('Payment',$Payment);
    }
}
