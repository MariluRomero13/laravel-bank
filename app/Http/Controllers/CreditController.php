<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Credit;
use App\Models\Customer;
use App\Models\Place;
use Datatables;
use DB;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $credits = DB::table('credits as c')
            ->join('customers as cu', 'cu.id', '=', 'c.customer_id')
            ->join('places as p', 'p.id', '=', 'c.place_id')
            ->select(
                'c.id as credit_id',
                DB::raw(' CONCAT(cu.name ," ", cu.first_last_name ," ", cu.second_last_name) as customer'),
                'p.name as place',
                'c.credit_type',
                'c.description',
                'c.behavior',
                'c.status'
            );
        if ($request->ajax()) {

            return datatables()
                ->query($credits)
                ->addColumn('credit_type', function ($row) {
                    if ($row->credit_type == 2) {
                        $td = '<td>' . "No bancario" . '</td>';
                    } else {
                        $td = '<td>' . "Bancario" . '</td>';
                    }
                    return $td;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/creditos-editar/' . $row->credit_id . '" data-id="' . $row->credit_id . '" class="btn btn-warning">' .
                        "<i class='fa fa-edit'></i>"
                        . '</a>';
                    return $btn;
                })
                ->addColumn('behavior', function ($row) {
                    switch ($row->behavior) {
                        case 1:
                            $btn = '<a data-id="' . $row->credit_id . '" class="btn btn-success behavior" data-target="' . $row->behavior . '">' .
                                "<i class='fa fa-check'></i>"
                                . '</a>';
                            break;
                        case 2:
                            $btn = '<a data-id="' . $row->credit_id . '" class="btn btn-warning behavior" data-target="' . $row->behavior . '">' .
                                "<i class='fa fa-minus'></i>"
                                . '</a>';
                            break;
                        case 3:
                            $btn = '<a data-id="' . $row->credit_id . '" class="btn btn-danger behavior" data-target="' . $row->behavior . '">' .
                                "<i class='fa fa-close'></i>"
                                . '</a>';
                            break;
                    }

                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        $btn = '<a data-id="' . $row->credit_id . '" class="btn btn-success delete" data-target="' . $row->status . '">' .
                            "<i class='fa fa-check'></i>"
                            . '</a>';
                    } else {
                        $btn = '<a data-id="' . $row->credit_id . '" class="btn btn-danger delete" data-target="' . $row->status . '">' .
                            "<i class='fa fa-close'></i>"
                            . '</a>';
                    }

                    return $btn;
                })
                ->rawColumns(['credit_type', 'action', 'behavior', 'status'])
                ->toJson();
        }
        return view('credits.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $places = Place::all();
        $customers = Customer::all();
        return view('credits.create', compact('places', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credit = new Credit();
        $customer = Customer::find($request->get('customer_id'));
        $place = Place::find($request->get('place_id'));
        $credit->credit_type = $request->get('credit_type');
        $credit->description = $request->get('description') ? $request->get('description') : 'Sin descripción';
        $credit->place_id = $place->id;
        $customer->credit()->save($credit);
        return view('credits.index');
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
        $credit = Credit::find($id);
        $customer = Customer::find($credit->customer_id);
        $place = Place::find($credit->place_id);
        $behaviors = [["value" => 1, "name" => 'Verde'], ["value" => 2, "name" => 'Amarillo'], ["value" => 3, "name" => 'Rojo']];
        $status = [["value" => 1, "name" => 'Activo'], ["value" => 0, "name" => 'Inactivo']];
        return view('credits.edit', compact('credit', 'customer', 'place', 'behaviors', 'status'));
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
        $credit = Credit::find($id);
        $customer = Customer::find($credit->customer_id);
        $credit->description = $request->get('description') ? $request->get('description') : 'Sin descripción';
        $credit->behavior = $request->get('behavior');
        $credit->status = $request->get('status');
        $customer->credit()->save($credit);
        return view('credits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $credit = Credit::find($id);
        $credit->status = !$credit->status;
        $credit->save();
        return response()->json([
            'success' => 'Credit deleted',
            'status' => $credit->status
        ]);
    }

    public function behavior($id)
    {
        $credit = Credit::find($id);
        switch ($credit->behavior) {
            case 1:
                $credit->behavior = 2;
                break;
            case 2:
                $credit->behavior = 3;
                break;
            case 3:
                $credit->behavior = 1;
                break;
        }
        $credit->save();
        return response()->json([
            'success' => 'behavior  deleted',
            'status' => 1
        ]);
    }
}
