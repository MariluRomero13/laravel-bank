<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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

    public function searchClient(Request $request)
    {
        if ($request->get('value') != null) {
            $customer = Customer::whereDoesntHave('creditBureau')->get();
            switch ($request->get('option')) {
                case 1:
                    $c = $customer->where('name', $request->get('value'));
                    break;
                case 2:
                    $c = $customer->where('rfc', $request->get('value'));
                    break;
                case 3:
                    $c = $customer->where('curp', $request->get('value'));
                    break;
                case 4:
                    $c = $customer->where('birthdate', $request->get('value'));
                    break;
            }
        } else {
            return ['status' => 0];
        }

        if ($c->count() > 0) {
            return ["customer" => $c, "status" => 1];
        } else {
            return ["status" => 2];
        }
    }
}
